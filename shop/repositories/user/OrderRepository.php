<?php
namespace shop\repositories\user;

use shop\entities\user\cabinet\Order;
use shop\repositories\NotFoundException;

class OrderRepository
{
    public function get($id): Order
    {
        if (!$obj = Order::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(Order $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Order $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}