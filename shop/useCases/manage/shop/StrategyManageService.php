<?php

namespace shop\useCases\manage\shop;




use shop\entities\shop\Strategy;
use shop\forms\manage\shop\StrategyForm;
use shop\repositories\shop\StrategyRepository;

class StrategyManageService
{
    private $repository;


    public function __construct(
        StrategyRepository $repository
    )
    {
        $this->repository = $repository;
    }


    public function create(StrategyForm $form): Strategy
    {
        $strategy = Strategy::create(
            $form->title,
            $form->description
        );

        if ($form->image) {
            $strategy->addPhoto($form->image);
        }

        $this->repository->save($strategy);
        return $strategy;
    }


    public function edit($id, StrategyForm $form): void
    {
        $strategy = $this->repository->get($id);
        $strategy->edit(
            $form->title,
            $form->description,
        );

        if ($form->image) {
            $strategy->addPhoto($form->image);
        }
        $this->repository->save($strategy);
    }



    public function removePhoto($id): void
    {
        $strategy = $this->repository->get($id);
        $strategy->removePhoto();
        $this->repository->save($strategy);
    }


    public function remove($id): void
    {
        $strategy = $this->repository->get($id);
        $this->repository->remove($strategy);
    }
}