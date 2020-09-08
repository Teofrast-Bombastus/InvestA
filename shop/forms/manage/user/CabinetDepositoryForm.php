<?php
namespace shop\forms\manage\user;

use shop\entities\user\cabinet\CabinetDepository;
use yii\base\Model;

class CabinetDepositoryForm extends Model
{
    public $description;
    private $_cabinetDepository;

    public function __construct(CabinetDepository $depository, array $config = [])
    {
        $this->description = $depository->description;
        $this->_cabinetDepository = $depository;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
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