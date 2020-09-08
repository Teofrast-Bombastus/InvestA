<?php

namespace backend\controllers\user;


use backend\forms\user\UserSearch;
use shop\entities\user\cabinet\CabinetDepository;
use shop\entities\user\User;
use shop\useCases\manage\cabinet\ProfileManageService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CabinetDepositoryController extends Controller
{
    private $service;

    public function __construct(
        $id,
        $module,
        ProfileManageService $profileManageService,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $profileManageService;
    }


    public function behaviors(): array
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

    public function actionUpdate($id_user)
    {
        $depository = $this->findModel($id_user);

        if ($depository->load(Yii::$app->request->post()) && $depository->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'depository' => $depository
        ]);
    }


    protected function findModel($id_user)
    {
        if (($model = CabinetDepository::findOne(['id_user' => $id_user])) !== null) {
            return $model;
        }
        if (($user = User::findOne($id_user)) == null) {
            throw  new NotFoundHttpException(404);
        }

        return new CabinetDepository(['id_user' => $id_user]);
    }

}
