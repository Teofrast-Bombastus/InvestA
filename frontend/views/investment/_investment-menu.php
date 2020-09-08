<?php

/** @var $this yii\web\View */

use yii\helpers\Url;

/** @var $active string */

?>


<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Инвестиции
        </h1>
    </div>
</div>

<section class="another-page-categoria">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="another-page-categoria-list">
                    <li class="<?= $active == 'accounts' ? 'catergoria-active' : ''?>  wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.3s">
                        <a href="<?= Url::to(['/investment/accounts']) ?>">
                            <div class="another-page-categoria-list-top">
                                <div class="another-page-categoria-list-top-img">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="40" viewBox="0 0 32 40"><g><g><g><path fill="#b8b8b8" d="M28.667 8V0H0v36.667h2V2h20.667z"/></g><g><path fill="#b8b8b8" d="M21.333 14V4.667L30.667 14zM26 18H9.333a.666.666 0 1 1 0-1.333H26A.666.666 0 1 1 26 18zm0 5.333H9.333a.666.666 0 1 1 0-1.333H26a.666.666 0 1 1 0 1.333zm0 5.334H9.333a.666.666 0 1 1 0-1.334H26a.666.666 0 1 1 0 1.334zM26 34H9.333a.666.666 0 1 1 0-1.333H26A.666.666 0 1 1 26 34zM9.333 11.333H16a.666.666 0 1 1 0 1.334H9.333a.666.666 0 1 1 0-1.334zm12.943-8H3.333V40H32V13.057z"/></g></g></g></svg>
                                    </span>
                                </div>
                                <div class="another-page-categoria-list-top-text">
                                    Прибыль: от 3% / мес. Инвесторов: 1350.
                                </div>
                            </div>
                            <div class="another-page-categoria-list-bottom">
                                ПАММ счета
                            </div>
                        </a>
                    </li>
                    <li class="<?= $active == 'bag' ? 'catergoria-active' : ''?>  wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.6s">
                        <a href="<?= Url::to(['/investment/bag']) ?>">
                            <div class="another-page-categoria-list-top">
                                <div class="another-page-categoria-list-top-img">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" viewBox="0 0 35 40"><g><g><g><path fill="#b8b8b8" d="M32.143 4.286h1.428V2.857H35V1.43H33.57V0h-1.428v1.429h-1.429v1.428h1.429z"/></g><g><path fill="#b8b8b8" d="M27.143 5.714h4.286v1.429h-4.286z"/></g><g><path fill="#b8b8b8" d="M30.714 8.571H35V10h-4.286z"/></g><g><path fill="#b8b8b8" d="M32.143 35.714h-1.429v1.429h-1.428v1.428h1.428V40h1.429v-1.429h1.428v-1.428h-1.428z"/></g><g><path fill=" #b8b8b8" d="M7.857 2.143h8.572c.394 0 .714-.32.714-.714V0h-10v1.429c0 .394.32.714.714.714z"/></g><g><path fill=" #b8b8b8" d="M25 25.714a.714.714 0 1 1-1.429 0 .714.714 0 0 1 1.429 0z"/></g><g><path fill="#b8b8b8" d="M13.476 38.06l-1.238-.713.715-1.238 1.237.715zm-2.52-1.612l-1.094-.917.918-1.095 1.095.921zm-2.201-2.025l-.918-1.094 1.092-.918.918 1.094zm-2.53-3.613l1.237-.714.714 1.237-1.237.714zm-1.15-2.76l1.342-.49.489 1.343-1.342.488zm-.653-2.92l1.407-.248.248 1.407-1.407.248zm-.136-2.987h1.428v1.428H4.286zm.384-2.963l1.407.248-.248 1.407-1.407-.249zm.894-2.857l1.342.489-.489 1.342-1.342-.489zm1.375-2.656l1.237.714-.714 1.238-1.237-.715zM7.143 5H8.57v1.429H7.143zm2.707 7.21l-.921 1.094-1.095-.92.918-1.093zm1.106-2.944l.919 1.091-1.095.922-.918-1.096zM10 5h1.429v1.429h-1.43zm2.857 0h1.429v1.429h-1.429zm2.857 0h1.429v1.429h-1.429zm8.572 31.857a14.286 14.286 0 1 1 0-28V2.143C24.286.959 23.326 0 22.143 0H18.57v1.429c0 1.183-.96 2.142-2.142 2.142H7.857A2.143 2.143 0 0 1 5.714 1.43V0H2.143C.959 0 0 .96 0 2.143v35.714C0 39.041.96 40 2.143 40h20c1.183 0 2.143-.96 2.143-2.143z"/></g><g><path fill="#d99a05" d="M19.286 20a.714.714 0 1 1-1.429 0 .714.714 0 0 1 1.429 0z"/></g><g><path fill="#b8b8b8" d="M17.388 27.908l-1.01-1.01 9.091-9.091 1.01 1.01zm6.898-.05a2.143 2.143 0 1 1 0-4.287 2.143 2.143 0 0 1 0 4.286zm-5.715-10a2.143 2.143 0 1 1 0 4.285 2.143 2.143 0 0 1 0-4.286zm15.715 5C34.286 15.755 28.529 10 21.429 10 14.328 10 8.57 15.756 8.57 22.857c0 7.1 5.757 12.857 12.858 12.857 7.097-.008 12.848-5.76 12.857-12.857z"/></g></g></g></svg>
                                    </span>
                                </div>
                                <div class="another-page-categoria-list-top-text">
                                   Прибыль: от 2% / мес. Инвесторов: 2120.

                                </div>
                            </div>
                            <div class="another-page-categoria-list-bottom">
                                ПАММ портфель
                            </div>
                        </a>
                    </li>
                    <li class="<?= $active == 'intellectual-investment' ? 'catergoria-active' : ''?>  wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.9s">
                        <a href="<?= Url::to(['/investment/intellectual-investment']) ?>">
                            <div class="another-page-categoria-list-top">
                                <div class="another-page-categoria-list-top-img">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="40" viewBox="0 0 27 40"><g><g><path fill="#e6e6e6" d="M21.562 16.354c-.174.19-.438.477-.794.859-.356.382-.62.668-.794.86-2.222 2.656-3.446 5.242-3.672 7.76h-5.938c-.225-2.518-1.45-5.104-3.671-7.76-.174-.192-.439-.478-.795-.86-.355-.382-.62-.668-.794-.86-1.18-1.37-1.77-2.933-1.77-4.687 0-1.25.299-2.413.898-3.49a7.929 7.929 0 0 1 2.344-2.643A12.056 12.056 0 0 1 9.779 3.92a11.166 11.166 0 0 1 3.554-.586c1.198 0 2.383.195 3.555.586 1.172.39 2.24.928 3.203 1.614a7.922 7.922 0 0 1 2.343 2.643 7.066 7.066 0 0 1 .9 3.49c0 1.754-.591 3.316-1.772 4.688zm3.945-9.492c-.772-1.485-1.788-2.717-3.046-3.698a15.146 15.146 0 0 0-4.27-2.318A14.426 14.426 0 0 0 13.333 0c-1.65 0-3.268.282-4.857.846a15.135 15.135 0 0 0-4.27 2.318c-1.259.98-2.275 2.213-3.047 3.698A10.253 10.253 0 0 0 0 11.666c0 2.691.894 5.018 2.682 6.98.782.85 1.428 1.605 1.94 2.265.513.66 1.03 1.488 1.55 2.487.52.998.816 1.931.886 2.8-.816.486-1.224 1.198-1.224 2.135 0 .643.217 1.198.65 1.667a2.37 2.37 0 0 0-.65 1.667c0 .903.39 1.606 1.172 2.11A2.454 2.454 0 0 0 6.667 35c0 .799.273 1.416.82 1.85.547.433 1.22.65 2.018.65a4.203 4.203 0 0 0 1.563 1.823c.694.452 1.45.677 2.265.677.817 0 1.572-.225 2.266-.677a4.202 4.202 0 0 0 1.563-1.823c.798 0 1.471-.217 2.018-.65.547-.434.82-1.051.82-1.85 0-.416-.113-.824-.34-1.223.782-.504 1.173-1.207 1.173-2.11 0-.642-.217-1.198-.651-1.667a2.372 2.372 0 0 0 .65-1.667c0-.937-.407-1.649-1.223-2.135.07-.869.365-1.802.885-2.8.522-.998 1.038-1.827 1.55-2.487a36.937 36.937 0 0 1 1.94-2.265c1.788-1.962 2.683-4.289 2.683-6.98 0-1.719-.387-3.32-1.16-4.804z"/></g></g></svg>
                                    </span>
                                </div>
                                <div class="another-page-categoria-list-top-text">
                                   Прибыль: от 5% / мес. Инвесторов: 575.

                                </div>
                            </div>
                            <div class="another-page-categoria-list-bottom">
                                Интеллектуальные
                                инвестиции
                            </div>
                        </a>
                    </li>
                    <li class="<?= $active == 'express-investment' ? 'catergoria-active' : ''?>  wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="1.2s">
                        <a href="<?= Url::to(['/investment/express-investment']) ?>">
                            <div class="another-page-categoria-list-top">
                                <div class="another-page-categoria-list-top-img">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="54" height="40" viewBox="0 0 54 40"><g><g><g><path fill="#e6e6e6" d="M3.392 32.164L0 40h16.186l-3.392-7.836z"/></g><g><path fill="#e6e6e6" d="M31.496 12.982h-9.403l-3.391 7.837h16.186z"/></g><g><path fill="#e6e6e6" d="M22.134 22.573H12.73L9.34 30.41h16.186z"/></g><g><path fill="#e6e6e6" d="M22.116 32.164L18.724 40H34.91l-3.391-7.836z"/></g><g><path fill="#e6e6e6" d="M40.794 32.164L37.404 40h16.185l-3.392-7.836z"/></g><g><path fill="#e6e6e6" d="M28.064 30.41H44.25l-3.392-7.837h-9.403z"/></g><g><path fill="#e6e6e6" d="M26.795 6.667a.819.819 0 0 0 .818-.82V.82a.819.819 0 1 0-1.637 0v5.029c0 .452.366.819.819.819z"/></g><g><path fill="#e6e6e6" d="M45.695 13.226a.813.813 0 0 0 .579-.24L49.78 9.48a.818.818 0 1 0-1.158-1.158l-3.506 3.506a.819.819 0 0 0 .579 1.398z"/></g><g><path fill="#e6e6e6" d="M7.198 12.986a.819.819 0 0 0 1.158-1.158L4.85 8.322A.819.819 0 0 0 3.692 9.48z"/></g><g><path fill="#e6e6e6" d="M15.106 8.12a.82.82 0 0 0 1.497-.665l-2.015-4.53a.82.82 0 1 0-1.496.665z"/></g><g><path fill="#e6e6e6" d="M36.556 8.167a.819.819 0 0 0 1.064-.456l1.841-4.604a.819.819 0 0 0-1.52-.608l-1.842 4.603a.819.819 0 0 0 .457 1.065z"/></g></g></g></svg>
                                    </span>
                                </div>
                                <div class="another-page-categoria-list-top-text">
                                    Прибыль: от 3-10% / мес. Инвесторов: 3443.
                                </div>
                            </div>
                            <div class="another-page-categoria-list-bottom">
                                CFD / Срочная инвестиция
                            </div>
                        </a>
                    </li>
                    <li class="<?= $active == 'ipo' ? 'catergoria-active' : ''?>  wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="1.5s">
                        <a href="<?= Url::to(['/investment/ipo']) ?>">
                            <div class="another-page-categoria-list-top">
                                <div class="another-page-categoria-list-top-img">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 50 40"><g><g><g><g><g><path fill="#e6e6e6" d="M47.658 26.668l-19.746-.02v2.03a1.761 1.761 0 0 1-1.756 1.756h-2.573a1.756 1.756 0 0 1-1.761-1.73v-2.03H2.096A3.506 3.506 0 0 1 0 25.967V37.64A2.37 2.37 0 0 0 2.36 40h44.973a2.37 2.37 0 0 0 2.4-2.34V25.988a3.506 3.506 0 0 1-2.075.68z"/></g></g></g><g><g><g><path fill="#e6e6e6" d="M18.31 6.607V3.106h13.113v3.501zm29.043 0H34.51V3.02A3.014 3.014 0 0 0 33.62.888 3.014 3.014 0 0 0 31.489 0H18.224a3.045 3.045 0 0 0-3.045 3.045v3.588H2.38A2.37 2.37 0 0 0 0 8.967v14.154a2.08 2.08 0 0 0 2.076 2.076h19.746v-2.03a1.761 1.761 0 0 1 1.756-1.756h2.568a1.756 1.756 0 0 1 1.766 1.73v2.03h19.73a2.08 2.08 0 0 0 2.091-2.05V8.967a2.37 2.37 0 0 0-2.38-2.36z"/></g></g></g></g></g></svg>
                                    </span>
                                </div>
                                <div class="another-page-categoria-list-top-text">
                                    Прибыль: от 20% / мес. Инвесторов: 775.

                                </div>
                            </div>
                            <div class="another-page-categoria-list-bottom">
                                IPO / ICO
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>