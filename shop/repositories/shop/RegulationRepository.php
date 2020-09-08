<?php

namespace shop\repositories\shop;

use shop\entities\shop\Regulation;
use shop\repositories\NotFoundException;

class RegulationRepository
{
    public function get($id): Regulation
    {
        if (!$regulation = Regulation::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $regulation;
    }

    public function save(Regulation $regulation): void
    {
        if (!$regulation->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Regulation $regulation): void
    {
        if (!$regulation->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }


}