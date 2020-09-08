<?php

namespace shop\forms\manage\user;


use yii\base\Model as BaseModel;
use yii\web\UploadedFile;


class CabinetFilesForm extends BaseModel
{

    /**
     * @var UploadedFile[]
     */
    public $files;
    public $type;

    public function rules(): array
    {
        return [
            ['type', 'string'],
            ['files', 'each', 'rule' => [
                'file', 'extensions' => 'doc, docx, pdf, xlsx, xls',
                'maxSize' => 5120000,
            ],
            ],
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