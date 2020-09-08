<?php


namespace console\controllers;


use shop\entities\user\cabinet\Operation;
use shop\entities\user\cabinet\UserCredit;
use shop\entities\user\User;
use yii\console\Controller;

class UserCreditController extends Controller
{

    public function actionFile()
    {
        file_put_contents(time() . '.txt', 'bla ' . time());
    }

    public function actionIndex()
    {
        $users = User::find()->where(['>', 'main_credit', 0])->all();
        if(empty($users)) return;
        foreach ($users as $user) {
            // Получить сумму всех кредитов по типу, если процент больше 0
            if ($user->deal_percent > 0) {
                $user->deal = $this->addPercentSumForCredit($user, 1, $user->deal_percent, 'deal');
            }
            if ($user->termin_percent > 0) {
                $user->termin_credit = $this->addPercentSumForCredit($user, 2, $user->termin_percent, 'termin_credit');
            }
            if ($user->liquidity_percent > 0) {
                $user->liquidity = $this->addPercentSumForCredit($user, 3, $user->liquidity_percent, 'liquidity');
            }
            // пересчитать сумму кредита
            $user->main_credit = $user->getMainCredit();
            $user->save(false);
        }
    }

    protected function addPercentSumForCredit(User &$user, $typeId, $creditPercent, $attr)
    {
        $creditSum = UserCredit::find()
            ->select("sum(price) as sum_price")
            ->where(['id_user' => $user->id, 'status' => 1, 'is_closed' => 0, 'type' => $typeId])
            ->asArray()
            ->one();

        if (empty($creditSum)) return 0;
        if (empty($creditSum['sum_price'])) return 0;
        // получить процент от суммы
        $percentSum = UserCredit::getPercent($creditSum['sum_price'], $creditPercent);
        // добавить процент к текущему типу кредита
        $user->$attr += $percentSum;
        if ($user->save(false)) {
            // Добавить операцию
            $this->addCreditOperation($user, $percentSum, UserCredit::getLabel($typeId));
        }

        return $user->$attr;
    }

    protected function addCreditOperation(User $user, float $amount, string $titleCredit)
    {
        $operation = Operation::create(
            $user->id,
            Operation::STATUS_SUCCESS,
            time(),
            $amount
        );
        $operation->type_operation = $titleCredit . ' <br> Начисление процентов ';
        $operation->save(false);
    }
}