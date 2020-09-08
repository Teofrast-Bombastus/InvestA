<?php

namespace shop\useCases\user;

use shop\entities\user\cabinet\Operation;
use shop\entities\user\cabinet\Order;
use shop\repositories\user\OperationRepository;
use shop\repositories\user\OrderRepository;
use shop\repositories\user\UserRepository;
use shop\services\TransactionManager;

class OrderService
{
    private $users;
    private $transaction;
    private $operationRepository;
    private $orderRepository;

    public function __construct
    (
        UserRepository $users,
        TransactionManager $transaction,
        OperationRepository $operationRepository,
        OrderRepository $orderRepository
    )
    {
        $this->users = $users;
        $this->transaction = $transaction;
        $this->operationRepository = $operationRepository;
        $this->orderRepository = $orderRepository;
    }




    public function success(Order $order): void
    {
        $user = $this->users->getUserById($order->user_id);
        $operation = $this->getOperation($order->user_id, $order->created_at);
        $order->paid();
        $operation->changeStatus(Operation::STATUS_SUCCESS);
        $user->inputMoney($order->amount);

        $this->transaction->wrap(function () use ($order, $operation, $user) {
            $this->users->save($user);
            $this->orderRepository->save($order);
            $this->operationRepository->save($operation);
        });

    }


    public function fail(Order $order): void
    {
        $operation = $this->getOperation($order->user_id, $order->created_at);
        $order->fail();
        $operation->changeStatus(Operation::STATUS_FAILED);

        $this->transaction->wrap(function () use ($order, $operation) {
            $this->orderRepository->save($order);
            $this->operationRepository->save($operation);
        });

    }


    private function getOperation($user_id, $created_at): ?Operation
    {
        return  $this->operationRepository->getByUserIdAndCreatedAt($user_id, $created_at);
    }



}