<?php
namespace shop\forms\manage\user;

use shop\entities\user\cabinet\CabinetDepository;
use yii\base\Model;

class CabinetDepositoryNewForm extends Model
{
    public $id_user;
    public $description;


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
        ];
    }

}