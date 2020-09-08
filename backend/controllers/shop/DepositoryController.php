<?php

namespace backend\controllers\shop;


use shop\entities\shop\depository\Depository;
use shop\entities\shop\depository\GalleryFile;
use shop\forms\manage\shop\depository\DepositoryForm;
use shop\forms\manage\shop\depository\GalleryFileForm;
use shop\forms\manage\shop\depository\GalleryPhotosForm;
use shop\useCases\manage\shop\DepositoryManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DepositoryController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        DepositoryManageService $service,
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
                    'delete-photo' => ['POST'],
                    'delete-file' => ['POST'],
                ],
            ],
        ];
    }


    public function actionView($id)
    {
        $depository = $this->findModel($id);

        $galleryPhotosForm = new GalleryPhotosForm();
        if ($galleryPhotosForm->load(Yii::$app->request->post()) && $galleryPhotosForm->validate()) {
            try {
                $this->service->addPhotos($depository->id, $galleryPhotosForm);
                return $this->redirect(['view', 'id' => $depository->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        $galleryFilesForm = new GalleryFileForm();
        if ($galleryFilesForm->load(Yii::$app->request->post()) && $galleryFilesForm->validate()) {
            try {
                $this->service->addFiles($depository->id, $galleryFilesForm);
                return $this->redirect(['view', 'id' => $depository->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        $dataProvider = new ActiveDataProvider([
            'query' => GalleryFile::find(),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        return $this->render('view', [
            'depository' => $depository,
            'galleryPhotosForm' => $galleryPhotosForm,
            'galleryFilesForm' => $galleryFilesForm,
            'dataProvider' => $dataProvider,
        ]);
    }




    public function actionUpdate($id)
    {
        $depository = $this->findModel($id);

        $form = new DepositoryForm($depository);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($depository->id, $form);
                return $this->redirect(['view', 'id' => $depository->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'depository' => $depository,
        ]);
    }



    /**
     * @param integer $id
     * @param $photo_id
     * @return mixed
     */
    public function actionDeletePhoto($id, $photo_id)
    {
        try {
            $this->service->removePhoto($id, $photo_id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id, '#' => 'photos']);
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
     * @return Depository the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Depository
    {
        if (($model = Depository::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
