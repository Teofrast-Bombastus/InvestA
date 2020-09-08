<?php

namespace frontend\controllers\payment;

use frontend\controllers\AppController;
use shop\entities\user\cabinet\Order;
use shop\readModels\OrderReadRepository;
use shop\useCases\user\OrderService;
use Yii;
use yii\web\NotFoundHttpException;

class InterkassaController extends AppController
{
    public $enableCsrfValidation = false;

    private $orders;
    private $service;

    public function __construct($id, $module, OrderReadRepository $orders, OrderService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->orders = $orders;
        $this->service = $service;
    }



    public function actions() {
        return [
            'interaction' => [
                'class' => 'lan143\interkassa\ResultAction',
                'callback' => [$this, 'interactionCallback'],
            ],
            'success' => [
                'class' => 'lan143\interkassa\SuccessAction',
                'callback' => [$this, 'successCallback'],
            ],
            'fail' => [
                'class' => 'lan143\interkassa\FailAction',
                'callback' => [$this, 'failCallback'],
            ],
        ];
    }


    public function actionInvoice($id)
    {
        $order = $this->loadModel($id);

        $params = [
            'ik_pm_no' => $order->id,
            'ik_am' => $order->amount,
            'ik_desc' => $order->getDescription(),
        ];

        return Yii::$app->interkassa->payment($params);
    }


    public function successCallback($ik_am, $ik_inv_st, $ik_pm_no)
    {

        $order = $this->loadModel($ik_pm_no);
        try {
            $this->service->success($order);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
        }

        Yii::$app->session->setFlash('success', 'Ваш платеж успешно выполнен');
        return $this->redirect('/cabinet/default/index');
    }

    public function failCallback($ik_am, $ik_inv_st, $ik_pm_no)
    {

        $order = $this->loadModel($ik_pm_no);
        try {
            $this->service->fail($order);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
        }
        Yii::$app->session->setFlash('success', 'Ошибка. Ваш платеж не выполнен');
        return $this->redirect('/cabinet/default/index');
    }

    public function interactionCallback($ik_am, $ik_inv_st, $ik_pm_no)
    {
        switch ($ik_inv_st)
        {
            case 'new':
//                $this->loadModel($ik_pm_no)->updateAttributes(['status' => Invoice::STATUS_NEW]);
                break;
            case 'waitAccept':
//                $this->loadModel($ik_pm_no)->updateAttributes(['status' => Invoice::STATUS_PENDING]);
                break;
            case 'process':
//                $this->loadModel($ik_pm_no)->updateAttributes(['status' => Invoice::STATUS_PROCESS]);
                break;
            case 'success':
                $order = $this->loadModel($ik_pm_no);
                try {
                    $this->service->success($order);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                }
                break;
            case 'canceled':
                $order = $this->loadModel($ik_pm_no);
                try {
                    $this->service->fail($order);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                }
                break;
            case 'fail':
                $order = $this->loadModel($ik_pm_no);
                try {
                    $this->service->fail($order);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                }
                break;
        }
    }



    private function loadModel($id): Order
    {
        if (!$order = $this->orders->findOwn($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $order;
    }
}