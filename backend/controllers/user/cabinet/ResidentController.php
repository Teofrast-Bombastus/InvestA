<?php


namespace backend\controllers\user\cabinet;

use backend\forms\user\ResidentSearch;
use shop\entities\user\UserResidentPay;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ResidentController extends Controller
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
        $searchModel = new ResidentSearch();
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
            if ($model->success()) {
                // перекинуть деньги на счет
                Yii::$app->session->setFlash('success', 'Заявка успешно подтверждена');
            } else {
                $er = implode($model->getFirstErrors());
                Yii::$app->session->setFlash('error', 'Заявка не сохранилась. '.$er);
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
            if ($model->reject() and $model->save()) {
                Yii::$app->session->setFlash('success', 'Заявка успешно отклонена');
            } else {
                $er = implode($model->getFirstErrors());
                Yii::$app->session->setFlash('error', 'Заявка не сохранилась. '.$er);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id]);
    }

    protected function findModel($id)
    {
        if (($model = UserResidentPay::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}