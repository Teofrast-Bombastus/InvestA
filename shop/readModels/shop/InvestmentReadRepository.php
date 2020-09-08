<?php

namespace shop\readModels\shop;

use shop\entities\shop\InvestmentFile;

class InvestmentReadRepository
{
    public function getInvestments(): array
    {
        return InvestmentFile::find()->all();
    }

}