<?php

namespace shop\entities\user\cabinet;

use yii\base\Model;

class CreditBaseForm extends Model
{
    public $price;
    public $type;

    public function rules()
    {
        return [
            ['price', 'number'],
            ['price', 'required'],
            ['type', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'price' => 'Сумма',
        ];
    }

    public function add()
    {
        if (!$this->validate()) {
            return false;
        }
        $credit = new UserCredit();
        $credit->id_user = \Yii::$app->user->id;
        $credit->type = $this->type;
        $credit->price = $this->price;
        $credit->percent = $credit->getPercentByType($this->type); // текущий % на данный мометн
        $credit->status = 0;
        $credit->is_closed = 0;
        if (!$credit->save()) {
            return false;
        }

        $operation = Operation::create(\Yii::$app->user->id, Operation::STATUS_WAIT, time(), $this->price, $credit->id);
        $operation->type_operation = UserCredit::getLabel($this->type);

        return $operation->save();
    }

    public function closeCredit()
    {
        $user = \Yii::$app->user->identity;

        if ($user->main_credit == 0) return true;

        $balance = $user->balance + $user->clean_credit;
        if ($balance < $user->main_credit) {
            $operation = Operation::create($user->id, Operation::STATUS_REJECTED, time(), $user->main_credit);
            $operation->type_operation = 'Закрытие кредита';
            $operation->save();
            return false;
        } else {
            $operation = Operation::create($user->id, Operation::STATUS_SUCCESS, time(), $user->main_credit);
            $operation->type_operation = 'Закрытие кредита';

            $user->balance = $balance - $user->main_credit;
            $user->clean_credit = 0;
            $user->main_credit = 0;
            $user->termin_credit = 0;
            $user->deal = 0;
            $user->liquidity = 0;
            if ($user->save(false)) {

                $credits = UserCredit::find()->where(['id_user' => $user->id])->all();
                if (!empty($credits)) {
                    foreach ($credits as $credit) {
                        $credit->is_closed = 1;
                        $credit->closed_date = date('Y-m-d H:i:s');
                        $credit->save(false);
                    }
                }
                $operation->save();
                return true;
            }

            return false;
        }
    }

}