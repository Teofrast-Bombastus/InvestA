<?php
namespace shop\forms\manage\shop;


use shop\entities\shop\Regulation;
use yii\web\UploadedFile;
use yii\base\Model as BaseModel;


class RegulationForm extends BaseModel
{
    public $showInIndex;
    /**
     * @var  UploadedFile $file
     */
    public $file;

    private $_regulation;

    public function __construct(Regulation $regulation = null, $config = [])
    {
        if ($regulation) {
            $this->showInIndex = $regulation->show_in_index;
            $this->_regulation = $regulation;
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            empty($this->_regulation->file) ? ['file', 'required'] : ['file', 'safe'],
            [['showInIndex'], 'boolean'],
            ['file', 'file', 'extensions' => 'doc, docx, pdf, xlsx, xls'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Файл',
            'showInIndex' => 'Показывать на главном экране',
        ];
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->file = UploadedFile::getInstance($this, 'file');
            return true;
        }
        return false;
    }

}