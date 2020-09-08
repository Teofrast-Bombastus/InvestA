<?php

namespace shop\entities\shop\depository;


use shop\services\MyImageUploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * @property integer $id
 * @property string $depository_id
 * @property string $image
 *
 * @mixin MyImageUploadBehavior
 */

class GalleryPhoto extends ActiveRecord
{
    public static function create(UploadedFile $file): self
    {
        $photo = new static();
        $photo->image = $file;
        return $photo;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public static function tableName(): string
    {
        return '{{%shop_depository_photos}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/depository_photo/[[attribute_depository_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/depository_photo/[[attribute_depository_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/depository_photo/[[attribute_depository_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/depository_photo/[[attribute_depository_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'preview' => ['width' => Yii::$app->params['licencePhotoPreviewWidth'], 'height' => Yii::$app->params['licencePhotoPreviewHeight']],
                    'origin' => ['width' => Yii::$app->params['licencePhotoWidth'], 'height' => Yii::$app->params['licencePhotoHeight']],
                ],
            ],
        ];
    }
}