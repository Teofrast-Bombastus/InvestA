<?php

namespace backend\controllers\shop;

use shop\entities\shop\Asset;
use shop\forms\manage\shop\AssetForm;
use shop\useCases\manage\shop\AssetManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AssetController extends Controller
{
    private $service;

    public function __construct(
        $id,
        $module,
        AssetManageService $service,
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
                    'activate' => ['POST'],
                    'draft' => ['POST'],
                    'delete-photo' => ['POST'],
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
            'query' => Asset::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionView($id)
    {
        $asset = $this->findModel($id);
        return $this->render('view', [
            'asset' => $asset,
        ]);
    }


    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new AssetForm();
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
        $asset = $this->findModel($id);

        $form = new AssetForm($asset);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($asset->id, $form);
                return $this->redirect(['view', 'id' => $asset->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'asset' => $asset,
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
    public function actionDeletePhoto($id)
    {
        try {
            $this->service->removePhoto((int)$id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['update', 'id' => $id,]);
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
