<?php

namespace shop\repositories\user;

use shop\entities\user\cabinet\Operation;
use shop\repositories\NotFoundException;

class OperationRepository
{
    public function get($id): Operation
    {
        if (!$operation = Operation::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $operation;
    }

    public function getByUserIdAndCreatedAt($userId, $created_at): Operation
    {
        if (!$operation = Operation::find()->where(['user_id' => $userId])->andWhere(['created_at' => $created_at])->one()) {
            throw new NotFoundException('Information is not found.');
        }
        return $operation;
    }

    public function save(Operation $operation): void
    {
        if (!$operation->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Operation $operation): void
    {
        if (!$operation->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }


}