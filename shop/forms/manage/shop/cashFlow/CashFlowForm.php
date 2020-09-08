<?php

namespace shop\forms\manage\shop\cashFlow;


use shop\entities\shop\cashFlow\CashFlow;
use yii\base\Model;


class CashFlowForm extends Model
{
    public $description;

    private $_cashFlow;

    public function __construct(CashFlow $cashFlow = null, $config = [])
    {
        if ($cashFlow){
            $this->description = $cashFlow->description;
            $this->_cashFlow = $cashFlow;
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