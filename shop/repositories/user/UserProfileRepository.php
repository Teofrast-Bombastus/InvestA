<?php
namespace shop\repositories\user;

use shop\entities\user\cabinet\UserProfile;
use shop\repositories\NotFoundException;

class UserProfileRepository
{

    public function get($id): \shop\entities\user\cabinet\UserProfile
    {
        if (!$userProfile = UserProfile::findOne($id)) {
            throw new NotFoundException('Information is not found.');
        }
        return $userProfile;
    }


    public function save(\shop\entities\user\cabinet\UserProfile $userProfile): void
    {
        if (!$userProfile->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(\shop\entities\user\cabinet\UserProfile $userProfile): void
    {
        if (!$userProfile->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }

}