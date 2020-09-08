<?php

namespace backend\controllers\shop;



use shop\entities\shop\aboutUs\AboutUs;
use shop\entities\shop\aboutUs\GalleryFile;
use shop\forms\manage\shop\aboutUs\AboutUsForm;
use shop\forms\manage\shop\aboutUs\GalleryFileForm;
use shop\forms\manage\shop\aboutUs\GalleryPhotosForm;
use shop\useCases\manage\shop\AboutUsManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AboutUsController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        AboutUsManageService $service,
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
        $aboutUs = $this->findModel($id);

        $galleryPhotosForm = new GalleryPhotosForm();
        if ($galleryPhotosForm->load(Yii::$app->request->post()) && $galleryPhotosForm->validate()) {
            try {
                $this->service->addPhotos($aboutUs->id, $galleryPhotosForm);
                return $this->redirect(['view', 'id' => $aboutUs->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        $galleryFilesForm = new GalleryFileForm();
        if ($galleryFilesForm->load(Yii::$app->request->post()) && $galleryFilesForm->validate()) {
            try {
                $this->service->addFiles($aboutUs->id, $galleryFilesForm);
                return $this->redirect(['view', 'id' => $aboutUs->id]);
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
            'aboutUs' => $aboutUs,
            'galleryPhotosForm' => $galleryPhotosForm,
            'galleryFilesForm' => $galleryFilesForm,
            'dataProvider' => $dataProvider,
        ]);
    }





    public function actionUpdate($id)
    {
        $aboutUs = $this->findModel($id);

        $form = new AboutUsForm($aboutUs);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($aboutUs->id, $form);
                return $this->redirect(['view', 'id' => $aboutUs->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'aboutUs' => $aboutUs,
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
     * @return AboutUs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): AboutUs
    {
        if (($model = AboutUs::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
