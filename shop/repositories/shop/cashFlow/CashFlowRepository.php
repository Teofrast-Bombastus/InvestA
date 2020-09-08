<?php

namespace shop\repositories\shop\cashFlow;

use shop\entities\shop\cashFlow\CashFlow;
use shop\repositories\NotFoundException;

class CashFlowRepository
{
    public function get($id): CashFlow
    {
        if (!$cashFlow = CashFlow::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $cashFlow;
    }


    public function save(CashFlow $cashFlow): void
    {
        if (!$cashFlow->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(CashFlow $cashFlow): void
    {
        if (!$cashFlow->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}