<?php

use shop\entities\user\cabinet\DepoAccount;
use shop\helpers\DepoAccountHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model shop\entities\user\cabinet\DepoAccount */

$this->title = 'Счет Депо от : ' . $model->user->first_name . ' ' . $model->user->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Счета Депо', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <?php if ($model->status == DepoAccount::STATUS_WAIT): ?>
        <p>
            <?= Html::a('Подтвердить', ['success', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data' => [
                    'confirm' => 'Вы действительно подтверждаете это действие?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Отклонить', ['reject', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно подтверждаете это действие?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>


    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [

                    [
                        'attribute' => 'created_at',
                        'label' => 'Дата создания',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Статус',
                        'value' => function (DepoAccount $model) {
                            return DepoAccountHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Логин пользователя',
                        'attribute' => 'user.username',
                        'value' => function (DepoAccount $model) {
                            return Html::a($model->user->username, ['/user/user/view', 'id' => $model->user->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'label' => 'Тип',
                        'attribute' => 'type',
                        'value' => DepoAccountHelper::getTypeName($model->type)
                    ],
                    [
                        'attribute' => 'first_name',
                        'label' => 'Имя',
                    ],
                    [
                        'attribute' => 'last_name',
                        'label' => 'Фамилия',
                    ],
                    [
                        'attribute' => 'father_name',
                        'label' => 'Отчество',
                    ],
                    [
                        'attribute' => 'address',
                        'label' => 'Адрес',
                    ],
                    [
                        'attribute' => 'passport',
                        'label' => 'Паспорт',
                    ],
                    [
                        'attribute' => 'inn',
                        'label' => 'ИНН',
                    ],
                    [
                        'attribute' => 'account_depo',
                        'value' => DepoAccountHelper::getAccountDepoName($model->account_depo),
                        'label' => 'Счет Депо',
                    ],
                    [
                        'attribute' => 'type_of_securities',
                        'label' => 'Тип ценных бумаг',
                    ],
                    [
                        'attribute' => 'terms',
                        'label' => 'Сроки',
                    ],
                    [
                        'attribute' => 'type_of_accounting',
                        'value' => DepoAccountHelper::getTypeOfAccountingName($model->type_of_accounting),
                        'label' => 'Тип учета',
                    ],
                    [
                        'attribute' => 'quantity_of_securities',
                        'label' => 'Количество ценных бумаг',
                    ],
                    [
                        'attribute' => 'nominal_cost',
                        'label' => 'Номинальная стоимость',
                    ],
                    [
                        'attribute' => 'bank',
                        'label' => 'Банк',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
