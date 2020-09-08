<?php

/** @var $projects shop\entities\shop\Project [] */


use yii\helpers\Url;
?>

<?php if (!empty($projects)): ?>
    <div class="galery_footer">
        <div class="galery_footer-row">

            <?php foreach ($projects as $project): ?>
                <div class="galery_footer-col">
                    <a href="<?= Url::to(['project/view', 'id' => $project->id]) ?>">
                        <?php if (!empty($project->image)): ?>
                            <img src="<?= $project->getThumbFileUrl('image', 'preview') ?>" alt="<?= $project->image ?>">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>