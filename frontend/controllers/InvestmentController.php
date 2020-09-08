<?php

namespace frontend\controllers;

use shop\readModels\shop\InvestmentReadRepository;

class InvestmentController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        InvestmentReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }


    public function actionAccounts(){

        return $this->render('accounts',[
            'investments' => $this->getInvestments(),
        ]);
    }

    public function actionBag(){

        return $this->render('bag',[
            'investments' => $this->getInvestments(),
        ]);
    }

    public function actionIntellectualInvestment(){

        return $this->render('intellectual-investment',[
            'investments' => $this->getInvestments(),
        ]);
    }

    public function actionExpressInvestment(){

        return $this->render('express-investment',[
            'investments' => $this->getInvestments(),
        ]);
    }

    public function actionIpo(){
        return $this->render('ipo',[
            'investments' => $this->getInvestments(),
        ]);
    }


    private function getInvestments()
    {
        return  $this->repository->getInvestments();
    }

}

