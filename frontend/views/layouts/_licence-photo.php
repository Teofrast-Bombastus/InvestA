<?php

/** @var $licencePhoto shop\services\MyImageUploadBehavior */
/** @var $i float */

?>


<div class="col-lg-2 col-md-4 col-sm-6 col-6 license-item wow fadeInLeftBig" data-wow-delay="<?=$i?>s" data-wow-duration="1s">
    <a href="<?= $licencePhoto->image ? $licencePhoto->getThumbFileUrl('image', 'origin') : '' ?>" class="license-item-link" data-fancybox="gallery">
        <img src="<?= $licencePhoto->image ? $licencePhoto->getThumbFileUrl('image', 'preview') : '' ?>" alt="<?= $licencePhoto->image ?: '' ?>">
        <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><g><g><g><path fill="#fff" d="M19.42 46.362H2.88V29.87H19.42zm19.244-25.187l-.037-10.618-10.57.019.005 2.879 5.692-.01L20.259 26.99H-.001v22.25h22.3V29.022l13.466-13.516.02 5.679z"/></g><g><path fill="#fff" d="M6.693 13.641H9.57v4.03H6.693z"/></g><g><path fill="#fff" d="M6.693 6.796H9.57v4.028H6.693z"/></g><g><path fill="#fff" d="M6.693 0H9.57v4.028H6.693z"/></g><g><path fill="#fff" d="M6.693 20.424H9.57v4.029H6.693z"/></g><g><path fill="#fff" d="M46.357 13.641h2.878v4.03h-2.878z"/></g><g><path fill="#fff" d="M46.357 6.796h2.878v4.028h-2.878z"/></g><g><path fill="#fff" d="M46.357 0h2.878v4.028h-2.878z"/></g><g><path fill="#fff" d="M46.357 20.424h2.878v4.029h-2.878z"/></g><g><path fill="#fff" d="M46.357 27.207h2.878v4.028h-2.878z"/></g><g><path fill="#fff" d="M46.357 33.99h2.878v4.028h-2.878z"/></g><g><path fill="#fff" d="M25.887 0h4.029v2.88h-4.029z"/></g><g><path fill="#fff" d="M19.041 0h4.03v2.88h-4.03z"/></g><g><path fill="#fff" d="M12.246 0h4.028v2.88h-4.028z"/></g><g><path fill="#fff" d="M32.67 0h4.028v2.88H32.67z"/></g><g><path fill="#fff" d="M39.453 0h4.028v2.88h-4.028z"/></g><g><path fill="#fff" d="M24.952 39.9h4.028v2.88h-4.028z"/></g><g><path fill="#fff" d="M31.734 39.9h4.029v2.88h-4.029z"/></g><g><path fill="#fff" d="M38.517 39.9h4.029v2.88h-4.03z"/></g><g><path fill="#fff" d="M45.433 39.9h3.802v2.88h-3.802z"/></g></g></g></svg>
        </span>
    </a>
</div>
