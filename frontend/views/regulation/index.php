<?php
/* @var $this yii\web\View */
/* @var $regulations shop\entities\shop\Regulation[] */
/* @var $licencePhotos shop\entities\shop\LicencePhoto[] */

$this->title = 'Документы';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Документы
        </h1>
    </div>
</div>
<?php if ($regulations): ?>
    <section class="document">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h2-wrapper">
                        <h2>Нормативные документы</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row document-main_row">
                <?php foreach ($regulations as $regulation): ?>
                    <?= $this->render('../layouts/_file', [
                        'file' => $regulation,
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($licencePhotos): ?>
    <section class="license nother-page-license">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h2-wrapper">
                        <h2>Лицензии</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container license-container">
            <div class="row">

                <?php $i = 0.3; ?>
                <?php foreach ($licencePhotos as $licencePhoto): ?>
                    <?= $this->render('../layouts/_licence-photo', [
                        'licencePhoto' => $licencePhoto,
                        'i' => $i,
                    ]) ?>
                    <?php $i += 0.3; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>


