<?php

namespace frontend\controllers\cabinet;


use frontend\controllers\AppController;
use shop\entities\user\cabinet\CabinetFile;
use shop\entities\user\cabinet\CreditBaseForm;
use shop\entities\user\cabinet\CreditForm;
use shop\entities\user\cabinet\DopLiquidityForm;
use shop\entities\user\cabinet\DTermCreditForm;
use shop\entities\user\cabinet\NotResidentPay;
use shop\entities\user\cabinet\Operation;
use shop\entities\user\cabinet\ResidentPay;
use shop\entities\user\cabinet\UserCredit;
use shop\entities\user\User;
use shop\entities\user\UserResidentPay;
use shop\forms\user\DepoAccountForm;
use shop\helpers\DepoAccountHelper;
use shop\useCases\cabinet\ProfileService;
use shop\useCases\user\UserService;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;


class DefaultController extends AppController
{

    public $layout = 'cabinet';
    private $service;
    private $userService;


    public function __construct($id, $module, ProfileService $service, UserService $userService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->userService = $userService;
    }


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

    public function actionIndex()
    {

        return $this->render('index', [
            'files' => CabinetFile::find()
                ->where(['or', ['type'=>  null], ['type'=>  '']])
                ->all(),
            'user' => $this->findUserModel(Yii::$app->user->id),
        ]);
    }

    public function actionCredit()
    {
        $credit = new CreditForm();
        $dtCredit = new DTermCreditForm();
        $dpLiquidity = new DopLiquidityForm();

        $post = Yii::$app->request->post();
        if ($credit->load($post) && $credit->add()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно принята. Ожидайте подтверждения');
            return $this->refresh();
        }
        if ($dtCredit->load($post) && $dtCredit->add()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно принята. Ожидайте подтверждения');
            return $this->refresh();
        }
        if ($dpLiquidity->load($post) && $dpLiquidity->add()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно принята. Ожидайте подтверждения');
            return $this->refresh();
        }

        return $this->render('cabinet', [
            'files' => CabinetFile::find()->where(['type' => 'credit'])->all(),
            'user' => $this->findUserModel(Yii::$app->user->id),
            'credit' => $credit,
            'dtCredit' => $dtCredit,
            'dpLiquidity' => $dpLiquidity,
        ]);
    }

    protected function additionalSum(User $user, $amount, $percent, $titleCredit)
    {
        if (!empty($amount) and !empty($percent)) {
            $mainAmount = UserCredit::getAmountWithPercent($amount, $percent);
            $operation = Operation::create(
                $user->id,
                Operation::STATUS_SUCCESS,
                time(),
                UserCredit::getPercent($amount, $percent)
            );
            $operation->type_operation = $titleCredit . ' <br> Начисление процентов ';
            $operation->save(false);

            return $mainAmount;
        } else {
            return 0;
        }
    }

    public function actionCloseCredit()
    {
        $closeCredit = new CreditBaseForm();
        if ($closeCredit->closeCredit()) {
            Yii::$app->session->setFlash('success', 'Кретид успешно закрыт');
        } else {
            Yii::$app->session->setFlash('error', 'Недостаточно личных средств на балансе для закрытия кредита');
        }
        return $this->redirect('/cabinet');
    }

    public function actionOpenAccount($type)
    {
        if (!array_key_exists((int)$type, DepoAccountHelper::typeList())) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $user = $this->findUserModel(Yii::$app->user->id);
        $form = new DepoAccountForm($user, $type);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userService->createDepoAccount($user->id, $form);
                Yii::$app->session->setFlash('success', 'Счет успешно создан');
                return $this->redirect(['index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('account', [
            'model' => $form,
            'type' => $type,
        ]);
    }

    public function actionNdfl()
    {
        $resident = new ResidentPay();
        $notResident = new NotResidentPay();

        $post = Yii::$app->request->post();
        if ($resident->load($post) && $resident->add(UserResidentPay::RES)) {
            Yii::$app->session->setFlash('success', 'Заявка успешно принята. Ожидайте подтверждения');
            return $this->refresh();
        }
        if ($notResident->load($post) && $notResident->add(UserResidentPay::NOT_RES)) {
            Yii::$app->session->setFlash('success', 'Заявка успешно принята. Ожидайте подтверждения');
            return $this->refresh();
        }

        return $this->render('ndfl', [
            'files' => CabinetFile::find()->where(['type' => 'ndfl'])->all(),
            'resident' => $resident,
            'notResident' => $notResident,
        ]);
    }

    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}