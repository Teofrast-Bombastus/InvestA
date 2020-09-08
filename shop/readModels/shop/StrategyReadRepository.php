<?php

namespace shop\readModels\shop;

use shop\entities\shop\Strategy;

class StrategyReadRepository
{
    public function getStrategies(): array
    {
        return Strategy::find()->orderBy(['id' => SORT_DESC])->all();
    }


}