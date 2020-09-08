<?php

namespace shop\entities\user;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property string $type_text
 * @property string $status
 * @property float $amount
 * @property integer $created_at
 */

class BonusAccount extends ActiveRecord
{
    const STATUS_SUCCESS =  'Успешно';

    const TYPE_INPUT =    1;
    const TYPE_OUTPUT =   2;


    public static function create($userId, $type, $typeText, $status, $amount, $createdAt): self
    {
        $obj = new self();
        $obj->user_id = $userId;
        $obj->type = $type;
        $obj->type_text = $typeText;
        $obj->status = $status;
        $obj->amount = $amount;
        $obj->created_at = $createdAt;
        return $obj;
    }



    ##########################

    public static function tableName(): string
    {
        return '{{%user_bonus_accounts}}';
    }

}