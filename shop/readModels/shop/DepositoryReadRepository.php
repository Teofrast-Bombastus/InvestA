<?php

namespace shop\readModels\shop;

use shop\entities\shop\depository\Depository;

class DepositoryReadRepository
{
    public function getDepository(): Depository
    {
        return Depository::findOne(1);
    }


}