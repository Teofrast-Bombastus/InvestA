<?php

namespace shop\entities\shop;


use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use shop\services\MyImageUploadBehavior;

/**
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 *
 * @mixin MyImageUploadBehavior
 */
class Strategy extends ActiveRecord
{

    public static function create($title, $description): self
    {
        $project = new static();
        $project->title = $title;
        $project->description = $description;
        return $project;
    }

    public function edit($title, $description): void
    {
        $this->title = $title;
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
        Yii::$app->db->createCommand("UPDATE shop_strategies SET image = NULL WHERE id = {$this->id}")->execute();
    }



    ##########################

    public static function tableName(): string
    {
        return '{{%shop_strategies}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => MyImageUploadBehavior::class,
                'attribute' => 'image',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/strategy/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/strategy/[[attribute_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/strategy/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '@static/cache/strategy/[[attribute_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'admin' => ['width' => 100, 'height' => 70],
                    'preview' => ['width' => 800, 'height' => 600],
                    'origin' => ['width' => 1270, 'height' => 750],
                ],
            ],
        ];
    }


}