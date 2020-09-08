<?php
namespace shop\entities\user\cabinet;


use shop\entities\user\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property string $first_name
 * @property string $last_name
 * @property string $father_name
 * @property string $address
 * @property string $passport
 * @property integer $inn
 * @property integer $account_depo
 * @property string $type_of_securities
 * @property integer $terms
 * @property integer $type_of_accounting
 * @property integer $quantity_of_securities
 * @property integer $nominal_cost
 * @property string $bank
 * @property integer $created_at
 * @property integer $status
 *
 * @property User $user
 */


class DepoAccount extends ActiveRecord
{

    const STATUS_WAIT =     1;
    const STATUS_SUCCESS =  2;
    const STATUS_REJECTED = 3;

    const TYPE_CRYPTO_CURRENCY =    1;
    const TYPE_STOCK_MARKET =       2;
    const TYPE_COMMODITY_MARKET =   3;
    const TYPE_CURRENCY =           4;

    const ACCOUNT_DEPO_INTERNAL =   1;
    const ACCOUNT_DEPO_EXTERNAL =   2;

    const TYPE_OF_ACCOUNTING_PIECE =    1;
    const TYPE_OF_ACCOUNTING_NOMINAL =  2;


    public static function create($userId, $type, $firstName, $lastName, $fatherName, $address, $passport, $inn, $createdAt): self
    {
        $obj = new static();
        $obj->user_id = $userId;
        $obj->type = $type;
        $obj->first_name = $firstName;
        $obj->last_name = $lastName;
        $obj->father_name = $fatherName;
        $obj->passport = $passport;
        $obj->address = $address;
        $obj->inn = $inn;
        $obj->created_at = $createdAt;
        $obj->status = self::STATUS_WAIT;
        return $obj;
    }


    public function setOtherInformation($account_depo, $type_of_securities, $terms, $type_of_accounting, $quantity_of_securities, $nominal_cost, $bank): void
    {
        $this->account_depo = $account_depo;
        $this->type_of_securities = $type_of_securities;
        $this->terms = $terms;
        $this->type_of_accounting = $type_of_accounting;
        $this->quantity_of_securities = $quantity_of_securities;
        $this->nominal_cost = $nominal_cost;
        $this->bank = $bank;
    }


    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function isSuccess(): bool
    {
        return $this->status == self::STATUS_SUCCESS;
    }

    public function isRejected(): bool
    {
        return $this->status == self::STATUS_REJECTED;
    }


    public function success(): void
    {
        if ($this->isSuccess()) {
            throw new \DomainException('Депо счет имеет статус успешный');
        }
        if ($this->isRejected()) {
            throw new \DomainException('Невозможно изменить статус');
        }
        $this->addStatus(self::STATUS_SUCCESS);
    }


    public function reject(): void
    {
        if ($this->isRejected()) {
            throw new \DomainException('Депо счет имеет статус отмененый');
        }
        if ($this->isSuccess()) {
            throw new \DomainException('Невозможно изменить статус');
        }
        $this->addStatus(self::STATUS_REJECTED);
    }


    public function addStatus($status): void
    {
        $this->status = $status;
    }



    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public static function tableName()
    {
        return '{{%user_depo_accounts}}';
    }


}
