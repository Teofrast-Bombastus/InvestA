<?php

namespace shop\forms\manage\shop\depository;

use yii\base\Model;
use yii\web\UploadedFile;

class GalleryPhotosForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $photos;

    public function rules(): array
    {
        return [
            ['photos', 'each', 'rule' => ['file', 'extensions' => 'jpeg ,jpg, png', 'mimeTypes' => 'image/jpeg, image/png']],
        ];
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->photos = UploadedFile::getInstances($this, 'photos');
            return true;
        }
        return false;
    }
}