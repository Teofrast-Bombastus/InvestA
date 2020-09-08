<?php

namespace backend\controllers\shop;


use shop\entities\shop\InvestmentFile;
use shop\forms\manage\shop\InvestmentForm;
use shop\useCases\manage\shop\InvestmentManageService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;

class InvestmentController extends Controller
{
    private $service;

    public function __construct(
        $id,
        $module,
        InvestmentManageService $service,
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
            'query' => InvestmentFile::find(),
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $form = new InvestmentForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->addFiles($form);
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'investmentForm' => $form,
        ]);
    }


    /**
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        try {
            $this->service->removeFile($id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

}
