<?php

namespace shop\forms\manage\shop\cooperation;


use yii\base\Model;
use yii\web\UploadedFile;

class GalleryFileForm extends Model
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