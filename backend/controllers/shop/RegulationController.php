<?php

namespace backend\controllers\shop;

use backend\forms\shop\RegulationSearch;
use shop\entities\shop\Regulation;
use shop\forms\manage\shop\RegulationForm;
use shop\useCases\manage\shop\RegulationManageService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RegulationController extends Controller
{
    private $service;

    public function __construct(
        $id,
        $module,
        RegulationManageService $service,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                    'delete-file' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */

    public function actionIndex()
    {
        $searchModel = new RegulationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $regulation = $this->findModel($id);

        return $this->render('view', [
            'regulation' => $regulation,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new RegulationForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $article = $this->service->create($form);
                return $this->redirect(['view', 'id' => $article->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('create', [
            'model' => $form,
        ]);
    }




    public function actionUpdate($id)
    {
        $regulation = $this->findModel($id);

        $form = new RegulationForm($regulation);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($regulation->id, $form);
                return $this->redirect(['view', 'id' => $regulation->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'regulation' => $regulation,
        ]);
    }


    /**
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        try {
            $this->service->remove($id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }





    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteFile($id)
    {
        try {
            $this->service->removeFile((int)$id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['update', 'id' => $id,]);
    }




    /**
     * @param integer $id
     * @return Regulation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id): Regulation
    {
        if (($model = Regulation::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
