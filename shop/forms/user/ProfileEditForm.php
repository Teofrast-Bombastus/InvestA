<?php

namespace shop\forms\user;

use shop\entities\user\User;
use shop\helpers\UserHelper;
use yii\base\Model;

class ProfileEditForm  extends Model
{
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $province;
    public $postIndex;
    public $type_account;

    public $_user;

    public function __construct(User $user, $config = [])
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->province = $user->province;
        $this->postIndex = $user->post_index;
        $this->type_account = $user->type_account;
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['first_name', 'phone', 'last_name', 'phone', 'type_account'], 'required'],
            [['first_name', 'last_name', 'phone', 'address', 'province', 'postIndex'], 'string', 'max' => 255],
            ['phone', 'replacePhone'],
            [['phone'], 'unique', 'targetClass' => User::class, 'filter' => ['<>', 'id', $this->_user->id]],
            ['type_account', 'integer'],
            ['type_account', 'in', 'range' => array_keys(UserHelper::accountTypeList())],
        ];
    }





    public function replacePhone()
    {
        $this->phone = str_replace(" ", "", $this->phone);
    }



    public function attributeLabels()
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Телефон',
            'address' => 'Адресс',
            'province' => 'Провинция',
            'postIndex' => 'Индекс',
            'type_account' => 'Тип счета',
        ];
    }

}