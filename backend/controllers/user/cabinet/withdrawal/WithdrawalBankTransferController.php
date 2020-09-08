<?php

namespace backend\controllers\user\cabinet\withdrawal;

use backend\forms\user\WithdrawalBankTransferSearch;
use shop\entities\user\cabinet\withdrawal\WithdrawalBankTransfer;
use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use shop\useCases\manage\user\UserManageService;


class WithdrawalBankTransferController extends Controller
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
        $searchModel = new WithdrawalBankTransferSearch();
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
            $this->userManegeService->successWithdrawalBankTransfer($id);
            Yii::$app->session->setFlash('success','Заявка на вывод средств успешно подтверждена');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }



    public function actionReject($id)
    {
        try{
            $this->userManegeService->rejectWithdrawalBankTransfer($id);
            Yii::$app->session->setFlash('success','Заявка на вывод средст успешно отклонена');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }






    protected function findModel($id)
    {
        if (($model = WithdrawalBankTransfer::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
