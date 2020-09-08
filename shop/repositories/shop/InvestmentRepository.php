<?php

namespace shop\repositories\shop;

use shop\entities\shop\InvestmentFile;
use shop\repositories\NotFoundException;

class InvestmentRepository
{
    public function get($id): InvestmentFile
    {
        if (!$investment = InvestmentFile::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $investment;
    }

    public function save(InvestmentFile $investment): void
    {
        if (!$investment->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(InvestmentFile $investment): void
    {
        if (!$investment->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }


}