<?php

namespace shop\useCases\manage\shop;

use shop\entities\shop\LicencePhoto;
use shop\forms\manage\shop\LicencePhotoForm;
use shop\repositories\shop\LicencePhotoRepository;


class LicencePhotoManageService
{

    private $repository;


    public function __construct(LicencePhotoRepository $repository)
    {
        $this->repository = $repository;
    }


    public function create(LicencePhotoForm $form): LicencePhoto
    {
        $licencePhoto = LicencePhoto::create($form->showInIndex);

        if ($form->image) {
            $licencePhoto->addPhoto($form->image);
        }

        $this->repository->save($licencePhoto);
        return $licencePhoto;
    }



    public function edit($id, LicencePhotoForm $form): void
    {
        $licencePhoto = $this->repository->get($id);
        $licencePhoto->edit($form->showInIndex);
        if ($form->image) {
            $licencePhoto->addPhoto($form->image);
        }
        $this->repository->save($licencePhoto);
    }


    public function removePhoto($id): void
    {
        $licencePhoto = $this->repository->get($id);
        $licencePhoto->removePhoto();
        $this->repository->save($licencePhoto);
    }


    public function remove($id): void
    {
        $licencePhoto = $this->repository->get($id);
        $this->repository->remove($licencePhoto);
    }


}