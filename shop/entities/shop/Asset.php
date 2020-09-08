<?php

namespace shop\entities\shop;


use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use shop\services\MyImageUploadBehavior;

/**
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $image
 * @property string $description
 *
 * @mixin MyImageUploadBehavior
 */
class Asset extends ActiveRecord
{

    public static function create($title, $subTitle, $description): self
    {
        $project = new static();
        $project->title = $title;
        $project->sub_title = $subTitle;
        $project->description = $description;
        return $project;
    }

    public function edit($title, $subTitle, $description): void
    {
        $this->title = $title;
        $this->sub_title = $subTitle;
        $this->description = $description;
    }



    // Photos

    public function addPhoto(UploadedFile $file): void
    {
        $this->image = $file;
    }


    public function removePhoto(): void
    {
        $this->cleanFiles();
        unset($this->image);
        Yii::$app->db->createCommand("UPDATE shop_assets SET image = NULL WHERE id = {$this->id}")->execute();
    }



    ##########################

    public static function tableName(): string
    {
        return '{{%shop_assets}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/asset/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/asset/[[attribute_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/asset/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/asset/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'preview' => ['width' => 800, 'height' => 600],
                    'origin' => ['width' => 1270, 'height' => 750],
                ],
            ],
        ];
    }


}