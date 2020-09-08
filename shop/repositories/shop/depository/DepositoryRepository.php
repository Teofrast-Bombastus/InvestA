<?php

namespace shop\repositories\shop\depository;

use shop\entities\shop\depository\Depository;
use shop\repositories\NotFoundException;

class DepositoryRepository
{
    public function get($id): Depository
    {
        if (!$depository = Depository::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $depository;
    }


    public function save(Depository $depository): void
    {
        if (!$depository->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Depository $depository): void
    {
        if (!$depository->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}