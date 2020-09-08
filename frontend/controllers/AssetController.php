<?php

namespace frontend\controllers;

use shop\entities\shop\Asset;
use shop\readModels\shop\AssetReadRepository;
use yii\web\NotFoundHttpException;

class AssetController extends AppController {

    private $repository;

    public function __construct(
        $id,
        $module,
        AssetReadRepository $repository,
        $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }



    public function actionIndex(){

        return $this->render('index',[
            'assets' => $this->repository->getAssets(),
        ]);
    }


    public function actionView($id){

        return $this->render('view',[
            'asset' => $this->findModel((int)$id),
        ]);
    }


    /**
     * @param integer $id
     * @return Asset the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Asset
    {
        if (($model = Asset::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

