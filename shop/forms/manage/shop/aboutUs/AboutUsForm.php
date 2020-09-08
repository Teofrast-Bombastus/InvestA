<?php

namespace shop\forms\manage\shop\aboutUs;



use shop\entities\shop\aboutUs\AboutUs;
use yii\base\Model;


class AboutUsForm extends Model
{
    public $description;

    private $_aboutUs;

    public function __construct(AboutUs $aboutUs = null, $config = [])
    {
        if ($aboutUs){
            $this->description = $aboutUs->description;
            $this->_aboutUs = $aboutUs;
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