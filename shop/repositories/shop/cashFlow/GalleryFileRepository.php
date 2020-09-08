<?php

namespace shop\repositories\shop\cashFlow;

use shop\entities\shop\cashFlow\GalleryFile;
use shop\repositories\NotFoundException;

class GalleryFileRepository
{
    public function get($id): GalleryFile
    {
        if (!$file = GalleryFile::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $file;
    }


    public function save(GalleryFile $file): void
    {
        if (!$file->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(GalleryFile $file): void
    {
        if (!$file->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}