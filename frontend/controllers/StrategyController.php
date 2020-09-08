<?php

namespace frontend\controllers;


use shop\entities\shop\Strategy;
use shop\forms\shop\StrategyForm;
use shop\readModels\shop\StrategyReadRepository;
use shop\useCases\shop\EmailService;
use Yii;
use yii\web\NotFoundHttpException;

class StrategyController extends AppController {

    private $repository;
    private $emailService;

    public function __construct(
        $id,
        $module,
        StrategyReadRepository $repository,
        EmailService $emailService,
        $config = []
    )
    {
        $this->repository = $repository;
        $this->emailService = $emailService;
        parent::__construct($id, $module, $config);
    }



    public function actionIndex(){

        $form = new StrategyForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->emailService->sendStrategy($form);
                Yii::$app->session->setFlash('success', 'Заявка успешно отправлена');
                $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('index',[
            'strategies' => $this->repository->getStrategies(),
            'strategyForm' => $form,
        ]);
    }



    /**
     * @param integer $id
     * @return Strategy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): Strategy
    {
        if (($model = Strategy::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

