<?php

namespace frontend\controllers;

use shop\readModels\shop\CooperationReadRepository;


class CooperationController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        CooperationReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }



    public function actionIndex(){

        return $this->render('index',[
            'cooperation' => $this->repository->getCooperation(),
        ]);
    }


}

