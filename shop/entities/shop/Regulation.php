<?php

namespace shop\entities\shop;


use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\FileUploadBehavior;

/**
 * @property integer $id
 * @property string $file
 * @property boolean $show_in_index
 *
 * @mixin FileUploadBehavior
 */
class Regulation extends ActiveRecord
{

    public static function create($showInIndex): self
    {
        $regulation = new static();
        $regulation->show_in_index = $showInIndex;
        return $regulation;
    }

    public function edit($showInIndex): void
    {
        $this->show_in_index = $showInIndex;
    }


    // File

    public function addFile(UploadedFile $file): void
    {
        $this->file = $file;
    }


    public function removeFile(): void
    {
        $this->cleanFiles();
        unset($this->file);
        $this->file = null;
        Yii::$app->db->createCommand("UPDATE shop_regulations SET file = NULL WHERE id = {$this->id}")->execute();
    }

    ##########################

    public static function tableName(): string
    {
        return '{{%shop_regulations}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => FileUploadBehavior::class,
                'attribute' => 'file',
                'filePath' => '@staticRoot/origin/regulation/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/regulation/[[attribute_id]]/[[id]].[[extension]]',
            ],
        ];
    }

}