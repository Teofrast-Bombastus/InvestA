<?php

/* @var  $this yii\web\View; */
/* @var  $user shop\entities\user\User */
$this->title = 'История операций';

use yii\helpers\Url;


$this->params['active_url'] = Url::to(['cabinet/cash/history']);

?>


<h1>История операций</h1>

<?php if (!empty($user->operations)): ?>

<div class="cash-flow-wrap">
    <table>
        <tbody>
            <tr>
                <td>№</td>
                <td>Тип операции</td>
                <td>Статус</td>
                <td>Создан</td>
                <td>Сумма</td>
            </tr>
            <?php foreach ($user->operations as $operation): ?>
                <tr>
                    <td><?= $operation->id ?></td>
                    <td><?= $operation->type_operation ?></td>
                    <td><?= $operation->status ?></td>
                    <td><?= Yii::$app->formatter->asDate($operation->created_at, 'php:d/m/Y') ?></td>
                    <td><?= $operation->amount ?> ₽</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php endif; ?>

