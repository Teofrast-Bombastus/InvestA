<?php

namespace shop\repositories\shop;

use shop\entities\shop\Asset;
use shop\repositories\NotFoundException;

class AssetRepository
{
    public function get($id): Asset
    {
        if (!$asset = Asset::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $asset;
    }


    public function save(Asset $asset): void
    {
        if (!$asset->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Asset $asset): void
    {
        if (!$asset->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}