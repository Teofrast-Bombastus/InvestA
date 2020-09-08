<?php

use shop\helpers\UserBonusAccountHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model shop\forms\manage\user\BonusAccountForm */
/* @var $user shop\entities\user\User */

$this->title = 'Изменить баланс на счету №' . $user->account . ' (' . $user->first_name . ' ' .$user->last_name . ')';
$this->params['breadcrumbs'][] = ['label' => 'Управления счетами (бонусы)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-create">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">

                    <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model,'type')->dropDownList(UserBonusAccountHelper::typeList(), ['prompt' => 'Тип операции']); ?>
                        <?= $form->field($model,'type_text')->textInput(); ?>
                        <?= $form->field($model,'amount')->textInput(); ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
