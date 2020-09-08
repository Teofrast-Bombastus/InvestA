<?php

namespace frontend\controllers;

use shop\readModels\shop\AboutUsReadRepository;

class AboutController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        AboutUsReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }



    public function actionIndex(){

        $aboutUs = $this->repository->getAboutUs();

        return $this->render('index',[
            'aboutUs' => $aboutUs,
        ]);
    }

}
