<?php

namespace backend\controllers\shop;

use shop\entities\shop\cooperation\Cooperation;
use shop\entities\shop\cooperation\GalleryFile;
use shop\forms\manage\shop\cooperation\CooperationForm;
use shop\forms\manage\shop\cooperation\GalleryFileForm;
use shop\useCases\manage\shop\CooperationManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CooperationController extends Controller
{
    private $service;


    public function __construct(
        $id,
        $module,
        CooperationManageService $service,
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
        $cooperation = $this->findModel($id);

        $dataProvider = new ActiveDataProvider([
            'query' => GalleryFile::find(),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);


        $galleryFilesForm = new GalleryFileForm();
        if ($galleryFilesForm->load(Yii::$app->request->post()) && $galleryFilesForm->validate()) {
            try {
                $this->service->addFiles($cooperation->id, $galleryFilesForm);
                return $this->redirect(['view', 'id' => $cooperation->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        return $this->render('view', [
            'cooperation' => $cooperation,
            'dataProvider' => $dataProvider,
            'galleryFilesForm' => $galleryFilesForm,
        ]);
    }




    public function actionUpdate($id)
    {
        $cooperation = $this->findModel($id);

        $form = new CooperationForm($cooperation);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($cooperation->id, $form);
                return $this->redirect(['view', 'id' => $cooperation->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'cooperation' => $cooperation,
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
     * @return Cooperation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Cooperation
    {
        if (($model = Cooperation::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
