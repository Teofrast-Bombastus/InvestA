<?php

namespace shop\readModels\shop;

use shop\entities\shop\Regulation;

class RegulationReadRepository
{
    public function getRegulationsForIndex()
    {
        return Regulation::find()
            ->where(['=', 'show_in_index', true])
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }

    public function getRegulations()
    {
        return Regulation::find()
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }

}