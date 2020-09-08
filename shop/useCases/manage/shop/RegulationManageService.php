<?php

namespace shop\useCases\manage\shop;


use shop\entities\shop\Regulation;
use shop\forms\manage\shop\RegulationForm;
use shop\repositories\shop\RegulationRepository;

class RegulationManageService
{
    private $repository;


    public function __construct(RegulationRepository $repository)
    {
        $this->repository = $repository;
    }


    public function create(RegulationForm $form): Regulation
    {
        $regulation = Regulation::create($form->showInIndex);
        if ($form->file) {
            $regulation->addFile($form->file);
        }
        $this->repository->save($regulation);
        return $regulation;
    }


    public function edit($id, RegulationForm $form): void
    {
        $regulation = $this->repository->get($id);
        $regulation->edit($form->showInIndex);
        if ($form->file) {
            $regulation->addFile($form->file);
        }
        $this->repository->save($regulation);
    }


    public function removeFile($id): void
    {
        $regulation = $this->repository->get($id);
        $regulation->removeFile();
        $this->repository->save($regulation);
    }


    public function remove($id): void
    {
        $regulation = $this->repository->get($id);
        $this->repository->remove($regulation);
    }
}