<?php

namespace shop\forms\manage\shop;

use shop\entities\shop\LicencePhoto;
use yii\base\Model;
use yii\web\UploadedFile;

class LicencePhotoForm extends Model
{
    public $showInIndex;
    /**
     * @var  UploadedFile $file
     */
    public $image;

    private $_licencePhoto;


    public function __construct(LicencePhoto $licencePhoto = null, $config = [])
    {
        if ($licencePhoto) {
            $this->showInIndex = $licencePhoto->show_in_index;
            $this->_licencePhoto = $licencePhoto;
        }
        parent::__construct($config);
    }


    public function rules(): array
    {
        return [
            empty($this->_licencePhoto->image) ? ['image', 'required'] : ['image', 'safe'],
            [['showInIndex'], 'boolean'],
            ['image', 'file', 'extensions' => 'jpeg ,jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'image' => 'Фото',
            'showInIndex' => 'Показывать на главном экране',
        ];
    }



    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->image = UploadedFile::getInstance($this, 'image');
            return true;
        }
        return false;
    }




}