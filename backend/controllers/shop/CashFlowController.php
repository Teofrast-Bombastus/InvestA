<?php

namespace backend\controllers\shop;

use shop\entities\shop\cashFlow\CashFlow;
use shop\entities\shop\cashFlow\GalleryFile;
use shop\forms\manage\shop\cashFlow\CashFlowForm;
use shop\forms\manage\shop\cashFlow\GalleryFileForm;
use shop\useCases\manage\shop\CashFlowManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CashFlowController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        CashFlowManageService $service,
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
                    'delete-file' => ['POST'],
                ],
            ],
        ];
    }


    public function actionView($id)
    {
        $cashFlow = $this->findModel($id);

        $dataProvider = new ActiveDataProvider([
            'query' => GalleryFile::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $galleryFilesForm = new GalleryFileForm();
        if ($galleryFilesForm->load(Yii::$app->request->post()) && $galleryFilesForm->validate()) {
            try {
                $this->service->addFiles($cashFlow->id, $galleryFilesForm);
                return $this->redirect(['view', 'id' => $cashFlow->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('view', [
            'cashFlow' => $cashFlow,
            'dataProvider' => $dataProvider,
            'galleryFilesForm' => $galleryFilesForm,
        ]);
    }



    public function actionUpdate($id)
    {
        $cashFlow = $this->findModel($id);

        $form = new CashFlowForm($cashFlow);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($cashFlow->id, $form);
                return $this->redirect(['view', 'id' => $cashFlow->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'cashFlow' => $cashFlow,
        ]);
    }

    /**
     * @param integer $id
     * @param integer $file_id
     * @return mixed
     */
    public function actionDeleteFile($id, $file_id)
    {
        try {
            $this->service->removeFile($id, $file_id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id, '#' => 'files']);
    }



    /**
     * @param integer $id
     * @return CashFlow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): CashFlow
    {
        if (($model = CashFlow::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
