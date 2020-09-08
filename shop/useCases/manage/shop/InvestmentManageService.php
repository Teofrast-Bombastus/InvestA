<?php

namespace shop\useCases\manage\shop;


use shop\entities\shop\InvestmentFile;
use shop\forms\manage\shop\InvestmentForm;
use shop\repositories\shop\InvestmentRepository;

class InvestmentManageService
{
    private $repository;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
    }


    public function addFiles(InvestmentForm $form): void
    {
        foreach ($form->files as $file) {
            $investmentFile = InvestmentFile::create($file);
            $this->repository->save($investmentFile);
        }
    }

    public function removeFile($id): void
    {
        $investmentFile = $this->repository->get($id);
        $this->repository->remove($investmentFile);
    }
}