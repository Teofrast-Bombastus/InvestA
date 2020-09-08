<?php

namespace frontend\controllers;

use shop\readModels\shop\CashFlowReadRepository;


class CashFlowController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        CashFlowReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }


    public function actionIndex(){

        return $this->render('index',[
            'cashFlow' => $this->repository->getCashFlow(),
        ]);
    }


}

