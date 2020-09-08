<?php
use kartik\form\ActiveForm;
use yii\helpers\Html;
use shop\helpers\FileHelper;
use yii\helpers\StringHelper;
use yii\helpers\Url;
$this->title = 'НДФЛ';

?>

<h1>НДФЛ</h1>

<div class="row">
    <div class="col-md-6 credit-form">
        <?php $residentForm = ActiveForm::begin(); ?>
        <h3>Для резидентов</h3>
        <?php echo $residentForm->field($resident, 'price')
            ->textInput(['class' => 'input form-control', 'type' => 'number'])
            ->label(false); ?>
        <p>Общий НДФЛ::
            <span class="" style="color: #d99a05"><?= $notResident->residentPercent  ?> %</span>
        </p>
        <?= Html::submitButton('Уплатить', ['class' => 'button']) ?>
        <?php  ActiveForm::end(); ?>
    </div>
    <div class="col-md-6 credit-form">
        <?php $notResidentForm = ActiveForm::begin(); ?>
        <h3>Для нерезидентов</h3>

        <?php echo $notResidentForm->field($notResident, 'price')
            ->textInput(['class' => 'input form-control', 'type' => 'number'])
            ->label(false); ?>
        <p>Общий НДФЛ:: <span class=""
                                    style="color: #d99a05"><?= $notResident->notResidentPercent ?> %</span>
        </p>

        <?= Html::submitButton('Уплатить', ['class' => 'button']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<br>
<br>

<div class="user-account-text">
    <p>
        Прибыль с биржевой торговли, как и «белая» зарплата, – это официальный доход гражданина. С него государство
        забирает 13% в виде налога на доход физически лиц (НДФЛ). В соответствии с п.2 ст. 226.1. Налогового Кодекса
        Российской Федерации (ООО ИНВЕСТАКТИВ), как брокер, осуществляющий в интересах клиента операции с ценными
        бумагами и (или) операции с производными финансовыми инструментами (далее – ПФИ) на основании договора на
        брокерское обслуживание, признается налоговым агентом клиента, определяет налоговую базу клиента, производит
        расчет, удержание и перечисление сумм налога на доходы физических лиц (далее – НДФЛ) в налоговые органы по всем
        операциям, осуществленным Банком в интересах клиента в соответствии с вышеуказанным договором.
    </p>

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
