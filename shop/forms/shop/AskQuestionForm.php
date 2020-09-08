<?php

namespace shop\forms\shop;


use yii\base\Model;

class AskQuestionForm extends Model
{
    public $username;
    public $phone;
    public $email;
    public $text;


    public function rules(): array
    {
        return [
            [['username', 'email', 'phone'], 'required'],
            [['username', 'phone', 'text'], 'string'],
            [['email'], 'email'],
            [['phone'], 'replacePhone'],
        ];
    }

    public function replacePhone()
    {
        return $this->phone = str_replace(' ', '', $this->phone);
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'text' => 'Комментарий',
        ];
    }

}