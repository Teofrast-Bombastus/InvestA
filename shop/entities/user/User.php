<?php

namespace shop\entities\user;


use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use phpDocumentor\Reflection\Types\Boolean;
use shop\entities\AggregateRoot;
use shop\entities\EventTrait;
use shop\entities\user\cabinet\DepoAccount;
use shop\entities\user\cabinet\Operation;
use shop\entities\user\cabinet\UserDocument;
use shop\entities\user\cabinet\UserProfile;
use shop\entities\user\events\UserResetPasswordRequested;
use shop\entities\user\events\UserSetAccountNumber;
use shop\entities\user\events\UserSignUpRequested;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property float $balance
 * @property integer $account
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property integer $type_account
 * @property string $promo_code
 * @property string $address
 * @property string $province
 * @property string $post_index
 * @property string $city
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $email_confirm_token
 * @property string $auth_key
 * @property integer $status
 * @property boolean $verified
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property UserProfile $userProfile
 * @property UserDocument[] $documents
 * @property DepoAccount[] $depoAccounts
 * @property Operation[] $operations
 */
class User extends ActiveRecord implements IdentityInterface, AggregateRoot
{
    use EventTrait;

    const ACCOUNT_NUMBER = 1015000;

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;

    const TYPE_ACCOUNT_TRADER = 1;
    const TYPE_ACCOUNT_BUSINESS = 2;
    const TYPE_ACCOUNT_INVESTOR = 3;


    public function edit(
        string $username,
        string $email,
        $blocked = 0,
        $termin_percent,
        $deal_percent,
        $liquidity_percent,
        $balance_deal
    ): void
    {
        $this->username = $username;
        $this->email = $email;
        $this->blocked = $blocked;
        $this->termin_percent = $termin_percent;
        $this->deal_percent = $deal_percent;
        $this->liquidity_percent = $liquidity_percent;
        $this->balance_deal = $balance_deal;
        $this->updated_at = time();
    }

    public function editProfile($firstName, $lastName, $phone, $address, $province, $postIndex, $typeAccount): void
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->phone = $phone;
        $this->address = $address;
        $this->province = $province;
        $this->post_index = $postIndex;
        $this->type_account = $typeAccount;
        $this->updated_at = time();
    }

//    public static function signup(string $username, string $email, string $password):self
//    {
//        $user = new static();
//        $user->username = $username;
//        $user->email = $email;
//        $user->setPassword($password);
//        $user->created_at = time();
//        $user->verified = false;
//        $user->balance = 0;
//        $user->status = self::STATUS_WAIT;
//        $user->generateEmailConfirmToken();
//        $user->generateAuthKey();
//        $user->recordEvent(new UserSignUpRequested($user));
//        return $user;
//    }

    public static function signupForFront($firstName, $lastName, $username, $email, $phone, $promoCode, $password, $typeAccount): self
    {
        $user = new static();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->username = $username;
        $user->email = $email;
        $user->phone = $phone;
        $user->type_account = $typeAccount;
        $user->promo_code = $promoCode;
        $user->setPassword($password);
        $user->created_at = time();
        $user->verified = false;
        $user->balance = 0;
        $user->status = self::STATUS_WAIT;
        $user->generateEmailConfirmToken();
        $user->generateAuthKey();
        $user->recordEvent(new UserSignUpRequested($user));
        $user->recordEvent(new UserSetAccountNumber($user));
        return $user;
    }

    public function getMainBalance()
    {
        return $this->balance + $this->clean_credit;
    }

    public function getMainCredit()
    {
        return $this->deal + $this->termin_credit + $this->liquidity;
    }

    public function setAccount($number): void
    {
        $this->account = $number;
    }


    public function outputMoney($amount): void
    {
        if ($amount > $this->balance) {
            throw new \DomainException('Допустимая сума: ' . $this->balance);
        }
        $this->balance -= $amount;
    }

    public function inputMoney($amount): void
    {
        $this->balance += $amount;
    }

    // confirm user by email

    public function confirmSignup()
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
        $this->removeEmailConfirmToken();

    }

    // change password

    public function requestPasswordReset(): void
    {
        if (!empty($this->password_reset_token) && self::isPasswordResetTokenValid($this->password_reset_token)) {
            throw new \DomainException('Password resetting is already requested.');
        }
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
        $this->recordEvent(new UserResetPasswordRequested($this));
    }

    public function resetPassword($password): void
    {
        if (empty($this->password_reset_token)) {
            throw new \DomainException('Password resetting is not requested.');
        }
        $this->setPassword($password);
        $this->password_reset_token = null;
    }

    public function getFullName(): string
    {
        return $this->first_name ? $this->first_name . ' ' . $this->last_name : $this->username;
    }


    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function verify()
    {
        if (!$this->isActive()) {
            throw new \DomainException('Пользователь не активен');
        }

        if ($this->verified) {
            throw new \DomainException('Пользователь уже верифицирован');
        }

        return $this->verified = true;
    }


    public function unVerify()
    {
        if (!$this->isActive()) {
            throw new \DomainException('Пользователь не активен');
        }

        if (!$this->verified) {
            throw new \DomainException('У пользователя уже снята верификация');
        }

        return $this->verified = false;
    }


    public static function tableName()
    {
        return '{{%users}}';
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => SaveRelationsBehavior::class,
                'relations' => ['depoAccounts'],
            ],
        ];
    }


    public function getUserProfile(): ActiveQuery
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    public function getDocuments(): ActiveQuery
    {
        return $this->hasMany(UserDocument::class, ['user_id' => 'id']);
    }

    public function getDepoAccounts(): ActiveQuery
    {
        return $this->hasMany(DepoAccount::class, ['user_id' => 'id']);
    }

    public function getOperations(): ActiveQuery
    {
        return $this->hasMany(Operation::class, ['user_id' => 'id']);
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }


    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }


    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }


    public function getAuthKey()
    {
        return $this->auth_key;
    }


    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    private function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    private function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    private function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }

    private function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }


}
