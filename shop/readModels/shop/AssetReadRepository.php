<?php

namespace shop\readModels\shop;

use shop\entities\shop\Asset;

class AssetReadRepository
{
    public function getAssets(): array
    {
        return Asset::find()->orderBy(['id' => SORT_DESC])->all();
    }


}