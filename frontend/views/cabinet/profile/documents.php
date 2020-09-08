<?php

/* @var $this yii\web\View */
/* @var $model shop\forms\user\UserDocumentsForm */
/* @var $user shop\entities\user\User */


use kartik\widgets\FileInput;
use shop\helpers\UserHelper;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Документы';
$this->params['active_url'] = Url::to(['cabinet/profile/documents']);
?>


<h1>
   Сканкопии и документы
</h1>
<div class="vd_documents--wrap">
	<div class="row output-wrap-container-text-margin">
		<div class="col-12">
			<p class="output-wrap-container-text">
				Для того, чтобы подтвердить свой счет, пожалуйста, загрузите необходимые документы, порядок загрузки не имеет значения.
			</p>
		</div>
        <div class="col-12 documents-title">
            <h3>Загрузите следующие файлы:  <span> Удостоверение личности/паспорт, подтверждение адреса, кредитная/дебетовая карта </span> </h3>

        </div>
	</div>

    <?php $form = ActiveForm::begin([
            'id' => 'file-form',
            'options' => [
                'enctype'=>'multipart/form-data',

            ],
        ]) ?>


        <div class="row">

            <div class="col-12">
                <?= $form->field($model, 'files[]')->label(false)->widget(FileInput::class, [
                    'options' => [
                        'accept' => '.doc, .docx, .pdf, .jpeg, .jpg, .png',
                        'multiple' => true,
                    ],
                    'pluginOptions' => [
                        'browseOnZoneClick' => true,
                        'showCaption' => false,
                        'showRemove' => false,
                        'showClose' => false,
                        'showUpload' => false,
                        'showBrowse' => false,
                    ],
                ]) ?>
            </div>

        </div>

        <div class="row vd_documents-item__button">
            <div class="col-12">
                <button type="submit" class="button">
                    Загрузить
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
                    </span>
                </button>
            </div>
        </div>
    <?php ActiveForm::end() ?>
</div>

<?php if (!empty($user->documents)): ?>
<div class="user-documents-container">

    <h2>Загруженые файлы</h2>

    <?php foreach ($user->documents as $document): ?>
        <div class="status-item">
            <p class="status-item-wrap-link">
                <a href="<?= $document->getUploadedFileUrl('file') ?>" target="_blank"><?= Html::encode($document->file) ?></a>
            </p>
            <p class="dooted-border"></p>
            <p>
                <span class="status">
                    <?= UserHelper::getVerificationDocumentName($document->verified) ?>
                </span>
            </p>
        </div>
    <?php endforeach; ?>
</div>

<?php endif; ?>






