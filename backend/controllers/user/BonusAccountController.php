<?php

namespace backend\controllers\user;

use backend\forms\user\DepoAccountSearch;
use backend\forms\user\UserSearch;
use shop\entities\user\cabinet\DepoAccount;
use shop\entities\user\User;
use shop\forms\manage\user\BonusAccountForm;
use Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use shop\useCases\manage\user\UserManageService;


class BonusAccountController extends Controller
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
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionCreate($user_id)
    {
        $user = $this->findUserModel($user_id);
        $form = new BonusAccountForm($user);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try{
                $user = $this->userManegeService->createBonusAccount($user->id, $form);
                Yii::$app->session->setFlash('success', 'Оперпция прошла успешно');
                return $this->redirect(['index']);
            } catch (\DomainException $e){
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error',$e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $form,
            'user' => $user,
        ]);
    }




    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
