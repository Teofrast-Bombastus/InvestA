<?php

namespace frontend\controllers\cabinet;

use frontend\controllers\AppController;
use shop\entities\user\cabinet\CabinetDepository;
use shop\entities\User\User;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class GraphController extends AppController
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }


    public $layout = 'cabinet';

    public function actionIndex(){

        return $this->render('index');
    }

}