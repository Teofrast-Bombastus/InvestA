<?php

namespace shop\entities\user\cabinet;

use yii\db\ActiveRecord;
use yii\web\User;

/**
 * @property integer $id
 * @property string $description
 */
class CabinetDepository extends ActiveRecord
{

    public function rules()
    {
        return [
            ['id_user', 'integer'],
            ['description', 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'depository' => 'Описание',
            'description' => 'Описание',
        ];
    }


    public function edit($description): void
    {
        $this->description = $description;
    }


    ##########################

    public static function tableName(): string
    {
        return '{{%user_cabinet_depository}}';
    }

    public function getUser()
    {
        return $this->hasOne(\shop\entities\user\User::class, ['id' => 'id_user']);
    }

}