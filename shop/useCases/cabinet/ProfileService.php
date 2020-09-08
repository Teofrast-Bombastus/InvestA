<?php

namespace shop\useCases\cabinet;


use shop\entities\user\cabinet\UserDocument;
use shop\entities\user\cabinet\UserProfile;
use shop\forms\User\ProfileEditForm;
use shop\forms\user\UserDocumentsForm;
use shop\forms\user\UserProfileForm;
use shop\repositories\user\UserDocumentsRepository;
use shop\repositories\user\UserProfileRepository;
use shop\repositories\user\UserRepository;


class ProfileService
{
    private $users;
    private $userProfileRepository;
    private $userDocumentsRepository;


    public function __construct(
        UserRepository $users,
        UserProfileRepository $userProfileRepository,
        UserDocumentsRepository $userDocumentsRepository
    )
    {
        $this->users = $users;
        $this->userProfileRepository = $userProfileRepository;
        $this->userDocumentsRepository = $userDocumentsRepository;
    }


    public function edit($id, ProfileEditForm $form): void
    {
        $user = $this->users->getUserById($id);
        $user->editProfile(
            $form->first_name,
            $form->last_name,
            $form->phone,
            $form->address,
            $form->province,
            $form->postIndex,
            $form->type_account
        );
        $this->users->save($user);
    }


    public function createUserProfile($userId, UserProfileForm $form): UserProfile
    {
        $user = $this->users->getUserById($userId);
        $userProfile = UserProfile::create(
            $user->id,
            $form->first_name,
            $form->last_name,
            $form->father_name,
            $form->nationality,
            $form->date,
            $form->passport_serie_and_number
        );
        $userProfile->setContactInformation(
            $form->phone,
            $form->email,
            $form->job,
            $form->company_name,
            $form->position,
            $form->family,
            $form->hobby
        );
        $userProfile->setOtherInformation(
            $form->relation_to_government,
            $form->experience_in_finance,
            $form->profit,
            $form->sourcesOfProfit ?: [],
            $form->month_profit,
            $form->trust_to_bank,
            $form->agree_for_send_email,
            $form->confirm_information
        );
        $this->userProfileRepository->save($userProfile);
        return $userProfile;
    }



    public function addUserDocuments($userId, UserDocumentsForm $form): void
    {
        $user = $this->users->getUserById($userId);
        foreach ($form->files as $file) {
            $userDocument = UserDocument::create($user->id, $file);
            $this->userDocumentsRepository->save($userDocument);
        }
    }


    public function removeUserDocument($id): void
    {
        $userDocument = $this->userDocumentsRepository->get($id);
        $this->userDocumentsRepository->remove($userDocument);
    }


}