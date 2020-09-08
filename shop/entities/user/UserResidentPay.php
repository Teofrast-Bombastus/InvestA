<?php


namespace shop\entities\user;


use shop\entities\user\cabinet\Operation;

class UserResidentPay extends \yii\db\ActiveRecord
{
    const NOT_RES = 0;
    const RES = 1;

    public static function tableName()
    {
        return '{{%user_resident_pay}}';
    }

    public function rules()
    {
        return [
            ['price', 'number'],
            [['price', 'id_user'], 'required'],
            ['type', 'safe'],
            ['status', 'safe'],
            ['id_operation', 'safe'],
        ];
    }

    public function success()
    {
        $user = $this->user;
        if ($user == null) {
            $this->addError('id_user', 'Пользователь не найден');
            return false;
        }
        $operation = $this->operation;
        if ($operation == null) {
            $this->addError('id_operation', 'Операция не найдена');
            return false;
        }
        $balance = $user->getMainBalance();

        if ($balance < $this->price) {
            $this->addError('price', 'Недостаточно средств для списания');
            return false;
        }
        // списать со своего личного счета
        if ($user->balance >= $this->price) {
            $user->balance = $user->balance - $this->price; // списание
        } else {
            // списать часть со своего и остальное со кредитного
            $rest = $this->price - $user->balance;
            $user->clean_credit = $user->clean_credit - $rest;
            $user->balance = 0;
        }

        if (!$user->save()) {
            $this->addError('price', 'Не удалось списать средства');
            return false;
        }
        $operation->status = Operation::STATUS_SUCCESS;
        $operation->save(false);
        $this->status = 1;
        $this->save(false);
        return true;
    }

    public function reject()
    {
        $operation = $this->operation;
        if ($operation == null) {
            $this->addError('id_operation', 'Операция не найдена');
            return false;
        }
        $operation->status = Operation::STATUS_REJECTED;
        $operation->save(false);

        return true;
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getOperation()
    {
        return $this->hasOne(Operation::className(), ['id' => 'id_operation']);
    }
}