<?php

namespace shop\entities\shop;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\FileUploadBehavior;

/**
 * @property integer $id
 * @property string $file
 *
 * @mixin FileUploadBehavior
 */

class InvestmentFile extends ActiveRecord
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


    ##########################

    public static function tableName(): string
    {
        return '{{%shop_investments}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => FileUploadBehavior::class,
                'attribute' => 'file',
                'filePath' => '@staticRoot/origin/investment/[[attribute_id]]/[[id]].[[extension]]',
                'fileUrl' => '@static/origin/investment/[[attribute_id]]/[[id]].[[extension]]',
            ],
        ];
    }

}