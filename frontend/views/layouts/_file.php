<?php

use shop\helpers\FileHelper;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/** @var $file */

?>


<div class="col-lg-3 col-md-4 col-sm-6 document-item">
    <a href="<?= $file->file ? $file->getUploadedFileUrl('file') : '' ?>" class="document-item-link" target="_blank" title="<?= $file->file ?: '' ?>">
        <div class="document-item-link-img">
            <img src="<?= Url::base() ?>/img/<?= $file->file ? FileHelper::getIcon($file->file) : '' ?>" alt="<?= $file->file ?: '' ?>" >
        </div>
        <div class="document-item-link-content">
            <p class="doc-name-computer">
                <?= StringHelper::truncate($file->file ?: '', 20) ?>
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19"><g><g><path fill="#d99a05" d="M18.53 13.356c0-.29.23-.52.52-.52.29 0 .528.23.528.52v5.116a.53.53 0 0 1-.528.528H.556a.524.524 0 0 1-.52-.528v-5.116c0-.29.23-.52.52-.52.29 0 .528.23.528.52v4.595H18.53zm-8.35 1.249a.534.534 0 0 1-.744 0L4.773 9.942a.52.52 0 0 1 0-.743.52.52 0 0 1 .744 0l3.762 3.763V.528a.524.524 0 1 1 1.049 0v12.434l3.77-3.763a.512.512 0 0 1 .736 0 .52.52 0 0 1 0 .743z"></path></g></g></svg>
                </span>
            </p>
        </div>
    </a>
</div>
