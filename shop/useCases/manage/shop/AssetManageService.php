<?php

namespace shop\useCases\manage\shop;


use shop\entities\shop\Asset;
use shop\forms\manage\shop\AssetForm;
use shop\repositories\shop\AssetRepository;

class AssetManageService
{
    private $repository;


    public function __construct(
        AssetRepository $repository
    )
    {
        $this->repository = $repository;
    }


    public function create(AssetForm $form): Asset
    {
        $asset = Asset::create(
            $form->title,
            $form->subTitle,
            $form->description
        );

        if ($form->image) {
            $asset->addPhoto($form->image);
        }

        $this->repository->save($asset);
        return $asset;
    }


    public function edit($id, AssetForm $form): void
    {
        $asset = $this->repository->get($id);
        $asset->edit(
            $form->title,
            $form->subTitle,
            $form->description,
        );

        if ($form->image) {
            $asset->addPhoto($form->image);
        }
        $this->repository->save($asset);
    }



    public function removePhoto($id): void
    {
        $asset = $this->repository->get($id);
        $asset->removePhoto();
        $this->repository->save($asset);
    }


    public function remove($id): void
    {
        $asset = $this->repository->get($id);
        $this->repository->remove($asset);
    }
}