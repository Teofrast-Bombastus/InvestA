<?php

namespace shop\forms\manage\shop\depository;


use shop\entities\shop\depository\Depository;
use yii\base\Model;


class DepositoryForm extends Model
{
    public $description;

    private $_depository;

    public function __construct(Depository $depository = null, $config = [])
    {
        if ($depository){
            $this->description = preg_replace("/<([a-z]*)\b[^>]*>/","\r\n", $depository->description);
            $this->_depository = $depository;
        }

        parent::__construct($config);
    }



    public function rules(): array
    {
        return [
            [['description'], 'string'],
            [['description'], 'filter', 'filter' => function($value){
                return trim(preg_replace("/\r\n|\r/", "<br>", $value));
            }],
        ];
    }


    public function attributeLabels()
    {
        return [
            'description' => 'Описание',
        ];
    }


}