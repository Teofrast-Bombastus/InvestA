<?php
namespace shop\forms\user;


use yii\web\UploadedFile;
use yii\base\Model as BaseModel;


class UserDocumentsForm extends BaseModel
{

    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules(): array
    {
        return [
            ['files', 'required'],
            ['files', 'each', 'rule' => ['file', 'extensions' => 'doc, docx, pdf, jpeg ,jpg, png']],
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

    public function attributeLabels()
    {
        return [
            'files' => 'Файлы'
        ];
    }

}