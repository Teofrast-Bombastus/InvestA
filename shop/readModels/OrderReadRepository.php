<?php

namespace shop\readModels;

use shop\entities\user\cabinet\Order;

class OrderReadRepository
{
    public function findOwn($id): ?Order
    {
        return Order::find()->andWhere(['id' => $id])->one();
    }
}