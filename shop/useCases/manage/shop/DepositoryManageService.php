<?php

namespace shop\useCases\manage\shop;


use shop\forms\manage\shop\depository\DepositoryForm;
use shop\forms\manage\shop\depository\GalleryFileForm;
use shop\forms\manage\shop\depository\GalleryPhotosForm;
use shop\repositories\shop\depository\GalleryFileRepository;
use shop\repositories\shop\depository\DepositoryRepository;

class DepositoryManageService
{
    private $repository;
    private $depositoryGalleryFileRepository;

    public function __construct(DepositoryRepository $repository, GalleryFileRepository $depositoryGalleryFileRepository)
    {
        $this->repository = $repository;
        $this->depositoryGalleryFileRepository = $depositoryGalleryFileRepository;
    }


    public function edit($id, DepositoryForm $form): void
    {
        $depository = $this->repository->get($id);
        $depository->edit($form->description);
        $this->repository->save($depository);

    }


    public function addPhotos($id, GalleryPhotosForm $form): void
    {
        $depository = $this->repository->get($id);
        foreach ($form->photos as $photo) {
            $depository->addPhoto($photo);
        }
        $this->repository->save($depository);
    }

    public function removePhoto($id, $photoId): void
    {
        $depository = $this->repository->get($id);
        $depository->removePhoto($photoId);
        $this->repository->save($depository);
    }


    public function addFiles($id, GalleryFileForm $form): void
    {
        $depository = $this->repository->get($id);
        foreach ($form->files as $file) {
            $depository->addFile($file);
        }
        $this->repository->save($depository);
    }

    public function removeFile($id, $fileId): void
    {
        $depository = $this->repository->get($id);
        $depository->removeFile($fileId);
        $this->repository->save($depository);
    }


}