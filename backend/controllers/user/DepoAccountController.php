<?php

namespace backend\controllers\user;

use backend\forms\user\DepoAccountSearch;
use shop\entities\user\cabinet\DepoAccount;
use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use shop\useCases\manage\user\UserManageService;


class DepoAccountController extends Controller
{

    private $userManegeService;

    public function __construct(string $id, Module $module, UserManageService $userManegeService, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->userManegeService = $userManegeService;
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'success' => ['POST'],
                    'reject' => ['POST'],
                ],
            ],
        ];
    }



    public function actionIndex()
    {
        $searchModel = new DepoAccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    public function actionSuccess($id)
    {
        try{
            $this->userManegeService->successDepoAccount($id);
            Yii::$app->session->setFlash('success','Счет Депо успешно подтвержден');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }



    public function actionReject($id)
    {
        try{
            $this->userManegeService->rejectDepoAccount($id);
            Yii::$app->session->setFlash('success','Счет Депо успешно отклонен');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }






    protected function findModel($id)
    {
        if (($model = DepoAccount::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
