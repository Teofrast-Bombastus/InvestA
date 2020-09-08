<?php

namespace shop\entities\shop;

use shop\services\MyImageUploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * @property integer $id
 * @property string $image
 * @property boolean $show_in_index
 *
 * @mixin MyImageUploadBehavior
 */

class LicencePhoto extends ActiveRecord
{
    public static function create($showInIndex): self
    {
        $licence = new static();
        $licence->show_in_index = $showInIndex;
        return $licence;
    }

    public function edit($showInIndex): void
    {
        $this->show_in_index = $showInIndex;
    }


    public function addPhoto(UploadedFile $image): void
    {
        $this->image = $image;
    }


    public function removePhoto(): void
    {
        $this->cleanFiles();
        unset($this->image);
        Yii::$app->db->createCommand("UPDATE shop_licence_photos SET image = NULL WHERE id = {$this->id}")->execute();
    }


    public static function tableName(): string
    {
        return '{{%shop_licence_photos}}';
    }



    public function behaviors(): array
    {
        return [
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/licence_gallery/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/licence_gallery/[[attribute_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/licence_gallery/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/licence_gallery/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'preview' => ['width' => Yii::$app->params['licencePhotoPreviewWidth'], 'height' => Yii::$app->params['licencePhotoPreviewHeight']],
                    'origin' => ['width' => Yii::$app->params['licencePhotoWidth'], 'height' => Yii::$app->params['licencePhotoHeight']],
                ],
            ],
        ];
    }
}