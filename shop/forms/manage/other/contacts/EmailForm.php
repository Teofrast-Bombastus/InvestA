<?php

namespace shop\forms\manage\other\contacts;

use shop\entities\other\contacts\Email;
use yii\base\Model;


class EmailForm extends Model
{

    public $email;

    private $_email;

    public function __construct(Email $email = null, $config = [])
    {
        if ($email) {
            $this->email = $email->email;
            $this->_email = $email;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'email' => 'Почта',
        ];
    }


}