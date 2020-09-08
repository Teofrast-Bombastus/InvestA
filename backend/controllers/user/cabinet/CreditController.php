<?php

namespace backend\controllers\user\cabinet;

use shop\entities\user\cabinet\UserCredit;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class CreditController extends \yii\web\Controller
{
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
        ];
    }

    public function actionIndex()
    {
        $searchModel = new \backend\forms\user\CreditOperationSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSuccess($id)
    {
        try {
            $model = $this->findModel($id);
            $model->status = 1;
            if ($model->allowCredit()) {
                // перекинуть деньги на счет
                Yii::$app->session->setFlash('success', 'Заявка успешно подтверждена');
            } else {
                Yii::$app->session->setFlash('error', 'Заявка не сохранилась');
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionReject($id)
    {
        try {
            $model = $this->findModel($id);
            $model->status = 2;
            if ($model->save() and $model->reject()) {
                Yii::$app->session->setFlash('success', 'Заявка успешно отклонена');
            } else {
                Yii::$app->session->setFlash('error', 'Заявка не сохранилась');
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }

    protected function findModel($id)
    {
        if (($model = UserCredit::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}