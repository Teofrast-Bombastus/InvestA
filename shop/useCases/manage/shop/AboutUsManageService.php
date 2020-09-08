<?php

namespace shop\useCases\manage\shop;



use shop\forms\manage\shop\aboutUs\AboutUsForm;
use shop\forms\manage\shop\aboutUs\GalleryFileForm;
use shop\forms\manage\shop\aboutUs\GalleryPhotosForm;
use shop\repositories\shop\aboutUs\AboutUsRepository;
use shop\repositories\shop\aboutUs\GalleryFileRepository;

class AboutUsManageService
{
    private $repository;
    private $galleryFileRepository;

    public function __construct(AboutUsRepository $repository, GalleryFileRepository $galleryFileRepository)
    {
        $this->repository = $repository;
        $this->galleryFileRepository = $galleryFileRepository;
    }


    public function edit($id, AboutUsForm $form): void
    {
        $aboutUs = $this->repository->get($id);
        $aboutUs->edit($form->description);
        $this->repository->save($aboutUs);

    }


    public function addPhotos($id, GalleryPhotosForm $form): void
    {
        $aboutUs = $this->repository->get($id);
        foreach ($form->photos as $photo) {
            $aboutUs->addPhoto($photo);
        }
        $this->repository->save($aboutUs);
    }

    public function removePhoto($id, $photoId): void
    {
        $aboutUs = $this->repository->get($id);
        $aboutUs->removePhoto($photoId);
        $this->repository->save($aboutUs);
    }


    public function addFiles($id, GalleryFileForm $form): void
    {
        $aboutUs = $this->repository->get($id);
        foreach ($form->files as $file) {
            $aboutUs->addFile($file);
        }
        $this->repository->save($aboutUs);
    }

    public function removeFile($id, $fileId): void
    {
        $aboutUs = $this->repository->get($id);
        $aboutUs->removeFile($fileId);
        $this->repository->save($aboutUs);
    }

}