<?php

namespace shop\entities\shop\cashFlow;


use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * @property integer $id
 * @property string $description
 *
 * @property GalleryFile[] $files
 */

class CashFlow extends ActiveRecord
{

    public function edit($description): void
    {
        $this->description = $description;
    }


    // Files

    public function addFile(UploadedFile $file): void
    {
        $files = $this->files;
        $files[] = GalleryFile::create($file);
        $this->files = $files ;
    }


    public function removeFile($id): void
    {
        $files = $this->files;
        foreach ($files as $i => $file) {
            if ($file->isIdEqualTo($id)) {
                unset($files[$i]);
                $this->updateFiles($files);
                return;
            }
        }
        throw new \DomainException('File is not found.');
    }


    private function updateFiles(array $files): void
    {
        $this->files = $files;
    }


    ##########################


    public function getFiles(): ActiveQuery
    {
        return $this->hasMany(GalleryFile::class, ['cash_flow_id' => 'id']);
    }


    public function behaviors(): array
    {
        return [
            [
                'class' => SaveRelationsBehavior::class,
                'relations' => ['files'],
            ],
        ];
    }


    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }


    public static function tableName(): string
    {
        return '{{%shop_cash_flow}}';
    }

}