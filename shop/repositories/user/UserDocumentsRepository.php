<?php

namespace shop\repositories\user;

use shop\entities\user\cabinet\UserDocument;
use shop\repositories\NotFoundException;

class UserDocumentsRepository
{
    public function get($id): UserDocument
    {
        if (!$obj = UserDocument::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function getByUserAndId($userId, $id): UserDocument
    {
        if (!$obj = UserDocument::findOne(['id' => $id, 'user_id' => $userId])) {
            throw new NotFoundException('Information is not found.');
        }
        return $obj;
    }

    public function save(UserDocument $obj): void
    {
        if (!$obj->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(UserDocument $obj): void
    {
        if (!$obj->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }


}