<?php

namespace shop\useCases\manage\shop;


use shop\forms\manage\shop\cashFlow\CashFlowForm;
use shop\forms\manage\shop\cashFlow\GalleryFileForm;
use shop\repositories\shop\cashFlow\CashFlowRepository;
use shop\repositories\shop\cashFlow\GalleryFileRepository;

class CashFlowManageService
{
    private $repository;
    private $fileRepository;

    public function __construct(CashFlowRepository $repository, GalleryFileRepository $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
    }


    public function edit($id, CashFlowForm $form): void
    {
        $cashFlow = $this->repository->get($id);
        $cashFlow->edit($form->description);
        $this->repository->save($cashFlow);

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