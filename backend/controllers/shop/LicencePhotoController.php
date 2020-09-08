<?php

namespace backend\controllers\shop;


use shop\entities\shop\LicencePhoto;
use shop\useCases\manage\shop\LicencePhotoManageService;
use shop\forms\manage\shop\LicencePhotoForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class LicencePhotoController extends Controller
{
    private $service;

    public function __construct(
        $id,
        $module,
        LicencePhotoManageService $service,
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
        $dataProvider = new ActiveDataProvider([
            'query' => LicencePhoto::find(),
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
        $licencePhoto = $this->findModel($id);

        return $this->render('view', [
            'licencePhoto' => $licencePhoto,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $form = new LicencePhotoForm();
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
        $licencePhoto = $this->findModel($id);

        $form = new LicencePhotoForm($licencePhoto);
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->edit($licencePhoto->id, $form);
                return $this->redirect(['view', 'id' => $licencePhoto->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('update', [
            'model' => $form,
            'licencePhoto' => $licencePhoto,
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
     * @return LicencePhoto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id): LicencePhoto
    {
        if (($model = LicencePhoto::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
