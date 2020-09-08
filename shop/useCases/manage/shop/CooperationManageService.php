<?php

namespace shop\useCases\manage\shop;


use shop\forms\manage\shop\cooperation\CooperationForm;
use shop\forms\manage\shop\cooperation\GalleryFileForm;
use shop\repositories\shop\cooperation\CooperationRepository;
use shop\repositories\shop\cooperation\GalleryFileRepository;

class CooperationManageService
{
    private $repository;
    private $fileRepository;

    public function __construct(CooperationRepository $repository, GalleryFileRepository $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
    }


    public function edit($id, CooperationForm $form): void
    {
        $cooperation = $this->repository->get($id);
        $cooperation->edit($form->description);
        $this->repository->save($cooperation);

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