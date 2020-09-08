<?php


namespace shop\entities\user\cabinet;


use yii\db\ActiveRecord;

class CreditType extends ActiveRecord
{

    public static function tableName()
    {
        return 'user_credit_types';
    }


}