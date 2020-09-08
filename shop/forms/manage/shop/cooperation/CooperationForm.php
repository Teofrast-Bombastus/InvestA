<?php

namespace shop\forms\manage\shop\cooperation;

use shop\entities\shop\cooperation\Cooperation;
use yii\base\Model;


class CooperationForm extends Model
{
    public $description;

    private $_cooperation;

    public function __construct(Cooperation $cooperation = null, $config = [])
    {
        if ($cooperation){
            $this->description = $cooperation->description;
            $this->_cooperation = $cooperation;
        }
        parent::__construct($config);
    }



    public function rules(): array
    {
        return [
            [['description'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'description' => 'Описание',
        ];
    }


}