<?php

namespace shop\repositories\shop;

use shop\entities\shop\LicencePhoto;
use shop\repositories\NotFoundException;

class LicencePhotoRepository
{
    public function get($id): LicencePhoto
    {
        if (!$licencePhoto = LicencePhoto::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $licencePhoto;
    }


    public function save(LicencePhoto $licencePhoto): void
    {
        if (!$licencePhoto->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(LicencePhoto $licencePhoto): void
    {
        if (!$licencePhoto->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}