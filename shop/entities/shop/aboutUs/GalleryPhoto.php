<?php

namespace shop\entities\shop\aboutUs;


use shop\services\MyImageUploadBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * @property integer $id
 * @property integer $about_id
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
        return '{{%shop_about_us_photos}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/about_photo/[[attribute_about_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/about_photo/[[attribute_about_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/about_photo/[[attribute_about_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/about_photo/[[attribute_about_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'preview' => ['width' => 600, 'height' => 400],
                    'origin' => ['width' => 1280, 'height' => 720],
                ],
            ],
        ];
    }
}