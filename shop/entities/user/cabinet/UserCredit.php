<?php


namespace shop\entities\user\cabinet;


use shop\entities\user\User;
use yii\db\ActiveRecord;

class UserCredit extends ActiveRecord
{
    const DEAL = 1;
    const TERM = 2;
    const LIQ = 3;

    public static function tableName()
    {
        return 'user_credits';
    }

    public function rules()
    {
        return [
            [['type', 'status', 'id_user', 'is_closed'], 'integer'],
            [['price', 'percent',], 'number'],
            [['closed_date',], 'safe'],
        ];
    }

    public function getPercentByType($type)
    {
        if ($type == self::TERM) return \Yii::$app->user->identity->termin_percent;
        if ($type == self::DEAL) return \Yii::$app->user->identity->deal_percent;
        if ($type == self::LIQ) return \Yii::$app->user->identity->liquidity_percent;
    }

    public function allowCredit()
    {
        $creditUser = $this->user;
        $newAmount = 0;
        if ($this->type == self::TERM) {
            $newAmount = self::getAmountWithPercent($this->price, $creditUser->termin_percent);
            $creditUser->termin_credit += $newAmount;
        }
        if ($this->type == self::DEAL) {
            $newAmount = self::getAmountWithPercent($this->price, $creditUser->deal_percent);
            $creditUser->deal += $newAmount;
        }
        if ($this->type == self::LIQ) {
            $newAmount = self::getAmountWithPercent($this->price, $creditUser->liquidity_percent);
            $creditUser->liquidity += $newAmount;
        }
        $creditUser->main_credit += $newAmount;
        $creditUser->clean_credit += $this->price;
        $creditUser->save(false);
        $this->status = 1;

        if (!$this->save(false)) return false;
        $operation = Operation::findOne(['id_credit' => $this->id]);
        if ($operation != null) {
            $operation->status = Operation::STATUS_SUCCESS;
            $operation->save(false);
        }
        return true;
    }

    public function reject()
    {
        $operation = Operation::findOne(['id_credit' => $this->id]);
        if ($operation != null) {
            $operation->status = Operation::STATUS_REJECTED;
            $operation->save(false);
        }
        return true;
    }

    public static function getLabel($id_type)
    {
        if ($id_type == self::DEAL) return 'Кредит / Сделка';
        if ($id_type == self::TERM) return 'Кредит / д.Срок';
        if ($id_type == self::LIQ) return 'Кредит / Ликвидность';
        return '';
    }

    public static function getAmountWithPercent(float $amount, float $percent)
    {
        if ($percent <= 0 or $amount <= 0) return $amount;
        return $amount + ($amount * ($percent / 100));
    }

    public static function getPercent(float $amount, float $percent)
    {
        return ($amount * ($percent / 100));
    }

    public function getActualUserCredits($userId)
    {
        //return $this;
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getDataType()
    {
        return $this->hasOne(CreditType::className(), ['id' => 'type']);
    }
}