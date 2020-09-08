<?php


/** @var $this yii\web\View */
/** @var $investments shop\entities\shop\InvestmentFile [] */

?>


<?php if (!empty($investments)):  ?>
    <section class="document another-page-document">
    <div class="container">
        <div class="row document-main_row">
            <?php foreach ($investments as $file): ?>
                <?= $this->render('../layouts/_file', [
                    'file' => $file,
                ]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>