<?php

namespace backend\controllers\user;


use shop\entities\user\cabinet\CabinetFile;
use shop\forms\manage\user\CabinetFilesForm;
use shop\useCases\manage\cabinet\ProfileManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class CabinetFileController extends Controller
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
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CabinetFile::find(),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $form = new CabinetFilesForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->addCabinetFiles($form);
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $form,
        ]);
    }


    /**
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        try {
            $this->service->removeCabinetFile($id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

}
