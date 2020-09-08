<?php

namespace frontend\controllers\cabinet;

use frontend\controllers\AppController;
use shop\entities\user\cabinet\Order;
use shop\forms\user\cabinet\withdrawal\WithdrawalCryptoCurrencyForm;
use shop\forms\user\cabinet\withdrawal\WithdrawalDebitCreditCardForm;
use shop\forms\user\cabinet\withdrawal\WithdrawalEPaymentForm;
use shop\forms\user\OrderForm;
use shop\forms\user\cabinet\withdrawal\WithdrawalBankTransferForm;
use shop\useCases\cabinet\ProfileService;
use shop\entities\User\User;
use shop\useCases\user\UserService;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class CashController extends AppController
{

    private $service;
    private $userService;

    public $layout = 'cabinet';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }


    public function __construct($id, $module, ProfileService $service, UserService $userService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->userService = $userService;
    }


    public function actionHistory()
    {
        return $this->render('history', [
            'user' => $this->findUserModel(Yii::$app->user->identity->getId())
        ]);
    }


    public function actionInput()
    {

        $user = $this->findUserModel(Yii::$app->user->id);
        $form = new OrderForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $order = $this->userService->createOrder($user->id, $form);
                return $this->redirect(['input-order', 'id' => $order->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('input', [
            'model' => $form,
        ]);
    }


    public function actionInputOrder($id)
    {
        $order = $this->findOrderModel($id);
        return $this->render('input-order', [
            'order' => $order,
        ]);
    }


    public function actionOutput()
    {
        return $this->render('output');
    }


    public function actionOutputBankTransfer()
    {

        $user = $this->findUserModel(Yii::$app->user->id);
        $form = new WithdrawalBankTransferForm($user);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userService->createWithdrawalBankTransfer($user->id, $form);
                Yii::$app->session->setFlash('success', 'Заявка успешно создана');
                return $this->redirect(['/cabinet/default/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('output-bank-transfer', [
            'model' => $form,
        ]);
    }



    public function actionOutputDebitCreditCard()
    {

        $user = $this->findUserModel(Yii::$app->user->id);
        $form = new WithdrawalDebitCreditCardForm($user);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userService->createWithdrawalDebitCreditCard($user->id, $form);
                Yii::$app->session->setFlash('success', 'Заявка успешно создана');
                return $this->redirect(['/cabinet/default/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('output-debit-credit-card', [
            'model' => $form,
        ]);
    }


    public function actionOutputEPayment()
    {

        $user = $this->findUserModel(Yii::$app->user->id);
        $form = new WithdrawalEPaymentForm($user);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userService->createWithdrawalEPayment($user->id, $form);
                Yii::$app->session->setFlash('success', 'Заявка успешно создана');
                return $this->redirect(['/cabinet/default/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('output-e-payment', [
            'model' => $form,
        ]);
    }



    public function actionOutputCryptoCurrency()
    {

        $user = $this->findUserModel(Yii::$app->user->id);
        $form = new WithdrawalCryptoCurrencyForm($user);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userService->createWithdrawalCryptoCurrency($user->id, $form);
                Yii::$app->session->setFlash('success', 'Заявка успешно создана');
                return $this->redirect(['/cabinet/default/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('output-crypto-currency', [
            'model' => $form,
        ]);
    }



    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findOrderModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
