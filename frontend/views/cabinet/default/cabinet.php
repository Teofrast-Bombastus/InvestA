<?php

/** @var  $this yii\web\View; */
/** @var  $files [] shop\entities\user\cabinet\CabinetFile */

$this->title = 'Личный кабинет';

use shop\entities\user\cabinet\DepoAccount;
use shop\helpers\FileHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<h1>Легкое решение по кредитованию </h1>
<div class="user-account-text">
    <p>
        ООО ИНВЕСТАКТИВ предлагает своим клиентам разные формы получения кредитования с целью преумножения своего
        капитала.
        Кредитование может осуществляться на одну конкретную сделку а так же
        На долгосрочную работу. Процентная ставка по кредитованию фиксированная, без скрытых платежей и комиссий.
    </p>
    <p>
        Каждый из клиентов ООО ИНВЕСТАКТИВ может получить кредитование
        при наличии инвестиционного плана в зависимости от своей кредитной истории и финансовой возможности.
    </p>
    <p>
        Кредитование получить легко. Для получения кредитных средств вам потребуются следующие документы ( Паспорт,
        ИНН/СНИСЛ ).
    </p>
    <p>
        По всем интересующимся вопросам вы можете проконсультироваться у наших специалистов.
    </p>

</div>
<div class="user-account-text">
    <?php
    $fieldOptions1 = [
        'options' => ['class' => 'form-group highlight-addon'],
        'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
    ];
    ?>
    <style>
        .credit-form p {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .credit-form h3 {
            margin: 15px 0 35px 0;
        }
        .credit-form {
            margin-bottom: 20px;
        }
        .credit-form .form-control {
            margin-bottom: 20px;
        }
        .credit-form {
            margin-top: 40px;
        }
    </style>
    <div class="row">
        <div class="col-md-6 credit-form">
            <?php $creditForm = ActiveForm::begin(); ?>
            <h3>Кредит / Сделка</h3>
            <?php echo $creditForm->field($credit, 'price', $fieldOptions1)
                ->textInput(['class' => 'input form-control', 'type' => 'number'])
                ->label(false); ?>
            <p>Сумма к погашению: <span class=""
                                        style="color: #d99a05"><?= Yii::$app->user->identity->deal ?> ₽</span>
            </p>
            <p>Процентная ставка: <span class=""
                                        style="color: #d99a05"><?= Yii::$app->user->identity->deal_percent ?> %</span>
            </p>
            <?= Html::submitButton('Получить кредит', ['class' => 'button']) ?>
            <?php $creditForm = ActiveForm::end(); ?>
        </div>
        <div class="col-md-6 credit-form">
            <?php $dtForm = ActiveForm::begin(); ?>
            <h3>Кредит / д. Срок</h3>

            <?php echo $dtForm->field($dtCredit, 'price', $fieldOptions1)
                ->textInput(['class' => 'input form-control', 'type' => 'number'])
                ->label(false); ?>
            <p>Сумма к погашению: <span class=""
                                        style="color: #d99a05"><?= Yii::$app->user->identity->termin_credit ?> ₽</span>
            </p>
            <p>Процентная ставка: <span class=""
                                        style="color: #d99a05"><?= Yii::$app->user->identity->termin_percent ?> %</span>
            </p>
            <?= Html::submitButton('Получить кредит', ['class' => 'button']) ?>
            <?php $dtForm = ActiveForm::end(); ?>
        </div>
    </div>
    <!--- --->
    <div class="row">
        <div class="col-md-6 credit-form">
            <?php $dpForm = ActiveForm::begin(); ?>
            <h3>Кредит / Ликвидность</h3>

            <?php echo $dpForm->field($dpLiquidity, 'price', $fieldOptions1)
                ->textInput(['class' => 'input form-control', 'type' => 'number'])
                ->label(false); ?>
            <p>Сумма к погашению: <span class="" style="color: #d99a05">
                        <?= Yii::$app->user->identity->liquidity ?> ₽</span>
            </p>
            <p>Процентная ставка: <span class=""
                                        style="color: #d99a05"><?= Yii::$app->user->identity->liquidity_percent ?> %</span>
            </p>
            <?= Html::submitButton('Получить кредит', ['class' => 'button']) ?>
            <?php $dpForm = ActiveForm::end(); ?>
        </div>
        <?php if (Yii::$app->user->identity->main_credit > 0) : ?>
            <div class="col-md-6 credit-form">
                <h3>Закрыть кредит</h3>
                <p>Сумма к погашению: <span class="" style="color: #d99a05">
                        <?= Yii::$app->user->identity->main_credit ?> ₽</span>
                </p>
                <?php $balance = Yii::$app->user->identity->getMainBalance() ?>
                <p>На балансе: <span class="" style="color: #d99a05"><?= $balance ?> ₽</span></p>
                <?= Html::a('Закрыть кредит', ['close-credit'], [
                    'class' => 'button btn btn-success',
                    'style' => 'background: #059F00',
                    'data' => [
                        'confirm' => 'Вы действительно хотите закрыть кредит ?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        <?php endif; ?>
    </div>
    <br>
    <br>
    <br>
</div>

<?php if (!empty($files)): ?>
    <div class="document">
        <div class="row">
            <div class="col-12">
                <div class="h2-wrapper">
                    <h2>Нормативные документы</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <?php foreach ($files as $file): ?>

                <div class="col-lg-3 col-md-4 col-sm-6 document-item">
                    <a href="<?= $file->file ? $file->getUploadedFileUrl('file') : '' ?>" class="document-item-link"
                       target="_blank" title="<?= $file->file ?: '' ?>">
                        <div class="document-item-link-img">
                            <img src="<?= Url::base() ?>/img/<?= $file->file ? FileHelper::getIcon($file->file) : '' ?>"
                                 alt="<?= $file->file ?: '' ?>">
                        </div>
                        <div class="document-item-link-content">
                            <p class="doc-name-computer">
                                <?= StringHelper::truncate($file->file ?: '', 10) ?>
                                <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><g><g><path
                                                    fill="#d99a05"
                                                    d="M18.53 13.356c0-.29.23-.52.52-.52.29 0 .528.23.528.52v5.116a.53.53 0 0 1-.528.528H.556a.524.524 0 0 1-.52-.528v-5.116c0-.29.23-.52.52-.52.29 0 .528.23.528.52v4.595H18.53zm-8.35 1.249a.534.534 0 0 1-.744 0L4.773 9.942a.52.52 0 0 1 0-.743.52.52 0 0 1 .744 0l3.762 3.763V.528a.524.524 0 1 1 1.049 0v12.434l3.77-3.763a.512.512 0 0 1 .736 0 .52.52 0 0 1 0 .743z"></path></g></g></svg>
                            </span>
                            </p>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>
