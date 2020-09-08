<?php

namespace shop\entities\shop\depository;


use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


/**
 * @property integer $id
 * @property string $description
 *
 * @property GalleryPhoto[] $photos
 * @property GalleryFile[] $files
 */

class Depository extends ActiveRecord
{

    public function edit($description): void
    {
        $this->description = $description;
    }


    // Photos

    public function addPhoto(UploadedFile $photo): void
    {
        $photos = $this->photos;
        $photos[] = GalleryPhoto::create($photo);
        $this->photos = $photos ;
    }

    public function removePhoto($id): void
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                unset($photos[$i]);
                $this->updatePhotos($photos);
                return;
            }
        }
        throw new \DomainException('Photo is not found.');
    }


    private function updatePhotos(array $photos): void
    {
        $this->photos = $photos;
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


    public function getPhotos(): ActiveQuery
    {
        return $this->hasMany(GalleryPhoto::class, ['depository_id' => 'id']);
    }

    public function getFiles(): ActiveQuery
    {
        return $this->hasMany(GalleryFile::class, ['depository_id' => 'id']);
    }



    ##########################

    public static function tableName(): string
    {
        return '{{%shop_depositories}}';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => SaveRelationsBehavior::class,
                'relations' => ['photos', 'files'],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

}