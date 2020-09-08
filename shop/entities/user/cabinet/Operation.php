<?php

namespace shop\entities\user\cabinet;

use shop\entities\user\User;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $type_operation
 * @property string $status
 * @property float $amount
 * @property integer $created_at
 */
class Operation extends ActiveRecord
{
    const STATUS_WAIT = 'Ожидание';
    const STATUS_SUCCESS = 'Успешно';
    const STATUS_REJECTED = 'Отклонено';
    const STATUS_FAILED = 'Отменено';
    const STATUS_NOT_CONFIRM = 'Не подтверждено';

    const TYPE_OPERATION_INPUT_MONEY = 1;
    const TYPE_OPERATION_INPUT_ADMIN = 2;
    const TYPE_OPERATION_OUTPUT_DEPO = 3;
    const TYPE_OPERATION_OUTPUT_MONEY = 4;
    const TYPE_OPERATION_OUTPUT_ADMIN = 5;


    public static function create($userId, $status, $createdAt, $amount, $id_credit = 0): self
    {
        $obj = new self();
        $obj->user_id = $userId;
        $obj->status = $status;
        $obj->created_at = $createdAt;
        $obj->amount = $amount;
        $obj->id_credit = $id_credit;
        return $obj;
    }


    public function changeStatus($status): void
    {
        $this->status = $status;
    }


    public function setTypeOperation($typeOperation, $value = false): void
    {
        switch ($typeOperation) {
            case self::TYPE_OPERATION_INPUT_MONEY:
                $out = '<p>Пополнения счета</p>';
                break;
            case self::TYPE_OPERATION_INPUT_ADMIN:
                $out = '<p>Начисление</p>';
                if ($value) {
                    $out .= '<p>(' . $value . ')</p>';
                }
                break;
            case self::TYPE_OPERATION_OUTPUT_DEPO:
                $out = '<p>Списание со счета</p>';
                if ($value) {
                    $out .= '<p>(' . $value . ')</p>';
                }
                break;
            case self::TYPE_OPERATION_OUTPUT_MONEY:
                $out = '<p>Вывод средств</p>';
                if ($value) {
                    $out .= '<p>(' . $value . ')</p>';
                }
                break;
            case self::TYPE_OPERATION_OUTPUT_ADMIN:
                $out = '<p>Списание со счета</p>';
                if ($value) {
                    $out .= '<p>(' . $value . ')</p>';
                }
                break;
            default:
                $out = '';
        }

        $this->type_operation = $out;
    }


    ##########################

    public static function tableName(): string
    {
        return '{{%user_history_operations}}';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}