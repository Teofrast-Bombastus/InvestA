<?php

namespace shop\readModels\shop;

use shop\entities\shop\cooperation\Cooperation;

class CooperationReadRepository
{
    public function getCooperation(): Cooperation
    {
        return Cooperation::findOne(1);
    }


}