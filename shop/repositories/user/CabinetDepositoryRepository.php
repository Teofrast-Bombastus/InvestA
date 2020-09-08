<?php

namespace shop\repositories\user;

use shop\entities\user\cabinet\CabinetDepository;
use shop\repositories\NotFoundException;

class CabinetDepositoryRepository
{
    public function get($id): CabinetDepository
    {
        if (!$depository = CabinetDepository::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $depository;
    }

    public function save(CabinetDepository $depository): void
    {
        if (!$depository->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(CabinetDepository $depository): void
    {
        if (!$depository->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }


}