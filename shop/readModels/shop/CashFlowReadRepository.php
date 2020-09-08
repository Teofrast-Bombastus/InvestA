<?php

namespace shop\readModels\shop;

use shop\entities\shop\cashFlow\CashFlow;

class CashFlowReadRepository
{
    public function getCashFlow(): CashFlow
    {
        return CashFlow::findOne(1);
    }


}