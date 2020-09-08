<?php

namespace shop\useCases\manage\cabinet;

use shop\entities\user\cabinet\CabinetFile;
use shop\forms\manage\user\CabinetDepositoryForm;
use shop\forms\manage\user\CabinetFilesForm;
use shop\repositories\user\CabinetDepositoryRepository;
use shop\repositories\user\CabinetFileRepository;


class ProfileManageService
{
    private $cabinetFileRepository;
    private $cabinetDepositoryRepository;

    public function __construct(CabinetFileRepository $cabinetFileRepository, CabinetDepositoryRepository $cabinetDepositoryRepository)
    {
        $this->cabinetFileRepository = $cabinetFileRepository;
        $this->cabinetDepositoryRepository = $cabinetDepositoryRepository;
    }

    public function addCabinetFiles(CabinetFilesForm $form): void
    {
        foreach ($form->files as $file) {
            $cabinetFile = CabinetFile::create($file, $form);
            $this->cabinetFileRepository->save($cabinetFile);
        }
    }

    public function removeCabinetFile($id): void
    {
        $cabinetFile = $this->cabinetFileRepository->get($id);
        $this->cabinetFileRepository->remove($cabinetFile);
    }


    public function editCabinetDepository($id, CabinetDepositoryForm $form): void
    {
        $depository = $this->cabinetDepositoryRepository->get($id);
        $depository->edit($form->description);
        $this->cabinetDepositoryRepository->save($depository);
    }


}