<?php

namespace shop\entities\user\cabinet;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\FileUploadBehavior;

/**
 * @property integer $id
 * @property string $file
 * @property string $type
 *
 * @mixin FileUploadBehavior
 */

class CabinetFile extends ActiveRecord
{
    public static function create(UploadedFile $file, $form): self
    {
        $object = new static();
        $object->file = $file;
        $object->type = $form->type;
        return $object;
    }


    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }


    ##########################

    public static function tableName(): string
    {
        return '{{%shop_cabinet_files}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => FileUploadBehavior::class,
                'attribute' => 'file',
                'filePath' => '@staticRoot/origin/cabinet/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/cabinet/[[attribute_id]]/[[id]].[[extension]]',
            ],
        ];
    }

}