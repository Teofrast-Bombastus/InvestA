<?php
namespace shop\forms\manage\user;


use shop\entities\user\BonusAccount;
use shop\entities\user\User;
use shop\helpers\UserBonusAccountHelper;
use yii\base\Model;

class BonusAccountForm extends Model
{
    public $type_text;
    public $amount;
    public $type;

    private $_user;

    public function __construct(User $user,  array $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['type_text', 'amount', 'type'], 'required'],
            ['type_text', 'string', 'max' => 255],
            $this->type == BonusAccount::TYPE_OUTPUT ? [['amount'], 'double',  'max' => $this->_user->balance, 'min' => 0.01] : [['amount'], 'double',  'min' => 0.01],
            ['type', 'integer'],
            ['type', 'in', 'range' => array_keys(UserBonusAccountHelper::typeList())],
        ];
    }



    public function attributeLabels()
    {
        return [
            'type_text' => 'Описание (Тип операции)',
            'amount' => 'Сумма',
            'type' => 'Тип операции',
        ];
    }


}