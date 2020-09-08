<?php

namespace frontend\controllers;

use shop\forms\shop\AskQuestionForm;
use shop\readModels\shop\DepositoryReadRepository;

class DepositoryController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        DepositoryReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }



    public function actionIndex(){

        $form = new AskQuestionForm();

        return $this->render('index',[
            'depository' => $this->repository->getDepository(),
            'askQuestionForm' => $form,
        ]);
    }



}

