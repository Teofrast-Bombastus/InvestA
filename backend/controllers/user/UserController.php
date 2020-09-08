<?php

namespace backend\controllers\user;

use shop\forms\manage\user\UserCreateForm;
use shop\forms\manage\user\UserEditForm;
use Yii;
use shop\entities\user\User;
use backend\forms\user\UserSearch;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use shop\useCases\manage\user\UserManageService;


class UserController extends Controller
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
                    'delete' => ['POST'],
                    'verify' => ['POST'],
                    'un-verify' => ['POST'],
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

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

//    public function actionCreate()
//    {
//        $form = new UserCreateForm();
//        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
//            try{
//                $user = $this->userManegeService->create($form);
//                return $this->redirect(['view', 'id' => $user->id]);
//            } catch (\DomainException $e){
//                Yii::$app->errorHandler->logException($e);
//                Yii::$app->session->setFlash('error',$e->getMessage());
//            }
//        }
//        return $this->render('create', [
//            'model' => $form,
//        ]);
//    }



    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $form = new UserEditForm($user);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            try{
                $this->userManegeService->edit($id, $form);
                return $this->redirect(['view', 'id' => $user->id]);
            } catch (\DomainException $e){
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error',$e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'user' => $user,
        ]);
    }

    public function actionDelete($id)
    {
        $this->userManegeService->remove($id);
        return $this->redirect(['index']);
    }

    public function actionVerifyIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('verify-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionVerify($id)
    {
        try{
            $this->userManegeService->verify($id);
            Yii::$app->session->setFlash('success','Пользователь успешно верифицирован');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['verify-index']);
    }

    public function actionUnVerify($id)
    {
        try{
            $this->userManegeService->unVerify($id);
            Yii::$app->session->setFlash('success','В пользователя успешно снята верификация');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['verify-index']);
    }


    public function actionDocuments($id)
    {
        return $this->render('documents', [
            'user' => $this->findModel($id),
        ]);
    }


    public function actionVerifyDocument($user_id, $id)
    {
        try{
            $this->userManegeService->verifyDocument($user_id, $id);
            Yii::$app->session->setFlash('success','Документ успешно верифицирован');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['documents', 'id' => $user_id]);
    }


    public function actionUnVerifyDocument($user_id, $id)
    {
        try{
            $this->userManegeService->unVerifyDocument($user_id, $id);
            Yii::$app->session->setFlash('success','В документа успешно снята верификация');
        } catch (\DomainException $e){
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error',$e->getMessage());
        }
        return $this->redirect(['documents', 'id' => $user_id]);
    }



    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
