<?php
namespace shop\forms\manage\shop;


use yii\web\UploadedFile;
use yii\base\Model as BaseModel;


class InvestmentForm extends BaseModel
{

    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules(): array
    {
        return [
            ['files', 'each', 'rule' => ['file', 'extensions' => 'doc, docx, pdf, xlsx, xls']],
        ];
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->files = UploadedFile::getInstances($this, 'files');
            return true;
        }
        return false;
    }

}