<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $assets shop\entities\shop\Asset[] */

$this->title = 'Активы';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Активы
        </h1>
    </div>
</div>

<?php if ($assets): ?>
    <section class="actives-post">
    <div class="container">
        <div class="row">
            <?php foreach ($assets as $asset): ?>
                <div class="col-12 actives-post-item">
                    <div class="row">
                        <div class="col-lg-4 col-12 actives-post-item-img">
                            <img src="<?= $asset->image ? $asset->getThumbFileUrl('image', 'origin') : '' ?>" alt="<?=  $asset->image ?: '' ?>">
                        </div>
                        <div class="col-lg-8 col-12 actives-post-item-content">
                            <h3><?= Html::encode($asset->title) ?></h3>
                            <p>
                                <?= StringHelper::truncateWords($asset->sub_title, 70) ?>
                            </p>
                            <div class="actives-post-item-content-link-wrap">
                                <a href="<?= Url::to(['/asset/view', 'id' => $asset->id]) ?>">Читать дальше</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>




