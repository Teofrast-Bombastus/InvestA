<?php


use common\widgets\Alert;
use yii\widgets\Breadcrumbs;


/** @var  $content string */
/** @var $this yii\web\View */

?>

<?php $this->beginContent('@frontend/views/layouts/layout.php') ?>

    <?= $this->render('_header'); ?>

    <main class="<?= !empty($this->params['contact-page']) ? 'contact-page' : '' ?>">
        <section class="breadcrumbs-section <?= !empty($this->params['home-page']) ? 'home-page' : '' ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?= Alert::widget() ?>
                </div>
            </div>
        </div>

        <?= $content ?>

    </main>

    <?= $this->render('_footer'); ?>


<?php $this->endContent() ?>










