<?php

namespace frontend\controllers\cabinet;

use frontend\controllers\AppController;
use shop\entities\user\cabinet\CabinetDepository;
use shop\entities\User\User;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class RegisterController extends AppController
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


    private $repository;
    public $layout = 'cabinet';



    public function actionIndex()
    {
        $depository = CabinetDepository::findOne(['id_user' => \Yii::$app->user->id]);

        return $this->render('index',[
            'depository' => $depository,
        ]);
    }

}
