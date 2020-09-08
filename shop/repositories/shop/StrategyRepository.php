<?php

namespace shop\repositories\shop;

use shop\entities\shop\Strategy;
use shop\repositories\NotFoundException;

class StrategyRepository
{
    public function get($id): Strategy
    {
        if (!$strategy = Strategy::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $strategy;
    }


    public function save(Strategy $strategy): void
    {
        if (!$strategy->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Strategy $strategy): void
    {
        if (!$strategy->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}