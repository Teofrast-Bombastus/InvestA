<?php

namespace shop\repositories\user;

use shop\entities\user\cabinet\CabinetFile;
use shop\repositories\NotFoundException;

class CabinetFileRepository
{
    public function get($id): CabinetFile
    {
        if (!$file = CabinetFile::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $file;
    }

    public function save(CabinetFile $file): void
    {
        if (!$file->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(CabinetFile $file): void
    {
        if (!$file->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }


}