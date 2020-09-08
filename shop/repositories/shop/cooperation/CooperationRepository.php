<?php

namespace shop\repositories\shop\cooperation;

use shop\entities\shop\cooperation\Cooperation;
use shop\repositories\NotFoundException;

class CooperationRepository
{
    public function get($id): Cooperation
    {
        if (!$cooperation = Cooperation::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $cooperation;
    }


    public function save(Cooperation $cashFlow): void
    {
        if (!$cashFlow->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Cooperation $cashFlow): void
    {
        if (!$cashFlow->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}