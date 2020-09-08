<?php

namespace shop\entities\shop\cashFlow;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\FileUploadBehavior;


/**
 * @property integer $id
 * @property integer $cash_flow_id
 * @property string $file
 *
 * @mixin FileUploadBehavior
 */

class GalleryFile extends ActiveRecord
{
    public static function create(UploadedFile $file): self
    {
        $object = new static();
        $object->file = $file;
        return $object;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }


    public static function tableName(): string
    {
        return '{{%shop_cash_flow_files}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => FileUploadBehavior::class,
                'attribute' => 'file',
                'filePath' => '@staticRoot/origin/cash_flow_files/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/cash_flow_files/[[attribute_id]]/[[id]].[[extension]]',
            ],
        ];
    }
}