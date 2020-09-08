<?php

use common\widgets\Alert;
use shop\helpers\UserHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;


/** @var  $content string */
/** @var $this yii\web\View */

$active_url = $this->params['active_url'] ?? null;

?>

<?php $this->beginContent('@frontend/views/layouts/layout.php') ?>

<?= $this->render('_header'); ?>

<?php if (\Yii::$app->user->identity->blocked) : ?>
    <div class="alert alert-danger text-center" style="text-align: center;" role="alert">
        Ваш торговый счет заморожен в связи с не выполненными финансовыми обязательствами. Обратитесь к вашему
        специалисту
    </div>
<?php endif ?>
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

    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-12 user-account-menu">
                <div class="user-account-menu-wrapper">
                    <div class="user-main-accout-wrapper">
                        <div class="user-avatar">
                            <a href="<?= Url::to(['cabinet/default/index']) ?>">
                                <img src="<?= Url::base() ?>/img/user-avatar.svg" alt="Аватар пользователя">
                            </a>
                        </div>
                        <div class="user-score-wrapper">
                            <p class="user-score">
                                <?php $balance = Yii::$app->user->identity->getMainBalance() ?>
                                Баланс: <?= UserHelper::showBalance($balance) ?> ₽</p>
                            <p class="user-score" title="Сумма к полному погашению с учетом % ставки.">
                                Кредит: <?= UserHelper::showBalance(Yii::$app->user->identity->main_credit) ?> ₽
                            </p>
                            <p class="user-score" style="color: #C70E0E">
                                Баланс /
                                Сделка: <?= UserHelper::showBalance(Yii::$app->user->identity->balance_deal) ?> ₽
                            </p>
                            <p class="user-score-add"><a href="<?= Url::to(['cabinet/cash/input']) ?>">Пополнить</a>
                            </p>
                        </div>
                    </div>

                    <div class="mkvs-menu-open">
                        <button class="mkvs-menu-open-button">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"><g><g><path
                                                        fill="#fff"
                                                        d="M9.5 1.874V0L4.844 3.748.13 0v1.874l4.713 3.748z"></path></g></g></svg>
                                    </span>
                            Навигация по кабинету
                        </button>
                    </div>
                    <ul class="user-account-menu-list">
                        <li class="user-account-menu-item <?= Url::to(['cabinet/profile/edit']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/profile/edit']) ?>">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                                 viewBox="0 0 16 17"><g><g><g><g><path fill="#011241"
                                                                                       d="M7.792 8.5c1.173 0 2.175-.415 3.005-1.245.83-.83 1.245-1.832 1.245-3.005 0-1.173-.415-2.175-1.245-3.005C9.967.415 8.965 0 7.792 0 6.619 0 5.617.415 4.787 1.245c-.83.83-1.245 1.832-1.245 3.005 0 1.173.415 2.175 1.245 3.005.83.83 1.832 1.245 3.005 1.245z"/></g><g><path
                                                                        fill="#011241"
                                                                        d="M15.545 12.988a11.33 11.33 0 0 0-.155-1.206 9.386 9.386 0 0 0-.294-1.201 5.695 5.695 0 0 0-.476-1.08c-.199-.35-.428-.649-.686-.896a2.89 2.89 0 0 0-.946-.592 3.327 3.327 0 0 0-1.234-.221c-.067 0-.222.079-.465.238-.244.158-.518.335-.825.531-.306.195-.705.373-1.195.53-.49.16-.983.239-1.478.239-.494 0-.986-.08-1.477-.238-.49-.158-.89-.336-1.195-.531-.307-.196-.581-.373-.825-.531-.243-.16-.398-.238-.465-.238-.45 0-.861.073-1.234.221a2.889 2.889 0 0 0-.946.592 3.892 3.892 0 0 0-.686.897c-.2.35-.358.71-.476 1.079s-.216.769-.293 1.2c-.078.432-.13.834-.155 1.207a16.58 16.58 0 0 0-.04 1.146c0 .885.27 1.584.809 2.097.539.513 1.254.769 2.147.769h9.673c.893 0 1.609-.256 2.148-.769.539-.513.808-1.212.808-2.097 0-.391-.013-.773-.04-1.146z"/></g></g></g></g></svg>
                                            </span>
                                <span class="user-account-menu--text">Персональная информация</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/cash/input']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/cash/input']) ?>">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     viewBox="0 0 16 16"><g><g><path fill="#011241"
                                                                                     d="M10.182 11.089c-.394.441-.962.701-1.705.78V13h-.948v-1.126c-1.239-.127-2.006-.848-2.301-2.16l1.464-.382c.136.825.585 1.237 1.348 1.237.356 0 .62-.088.788-.264a.895.895 0 0 0 .252-.64c0-.259-.084-.455-.252-.588-.168-.134-.542-.303-1.121-.508-.52-.18-.928-.358-1.22-.536a2.016 2.016 0 0 1-.715-.74 2.196 2.196 0 0 1-.274-1.111c0-.554.164-1.053.49-1.496.326-.443.84-.713 1.541-.812V3h.948v.874c1.058.127 1.744.726 2.055 1.797l-1.304.535c-.255-.734-.648-1.101-1.181-1.101-.268 0-.483.082-.644.246a.818.818 0 0 0-.243.596c0 .239.078.421.235.55.155.126.49.283 1.002.472.562.205 1.003.4 1.323.582.32.182.575.435.766.757.19.322.286.698.286 1.129 0 .66-.197 1.211-.59 1.652zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0z"/></g></g></svg>
                                               </span>
                                <span class="user-account-menu--text">Пополнение счета<span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/cash/history']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/cash/history']) ?>">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         viewBox="0 0 16 16"><g><g><path fill="#011241"
                                                                                         d="M8.067 9.521c-.012 0-.022-.002-.034-.003L8 9.521a.553.553 0 0 1-.553-.553V3.32a.553.553 0 0 1 1.106 0v5.095h2.905a.553.553 0 0 1 0 1.106zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0z"/></g></g></svg>
                                                   </span>
                                <span class="user-account-menu--text">История операций</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/cash/output']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/cash/output']) ?>">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24"
                                                         viewBox="0 0 18 24"><g><g><g><g><g><path fill="#011241"
                                                                                                  d="M7.535 7.778h-.486a1.703 1.703 0 0 1-1.702-1.702c0-.854.636-1.557 1.459-1.676v-.511a.486.486 0 1 1 .972 0v.486h.972a.486.486 0 1 1 0 .972H7.049a.73.73 0 0 0 0 1.459h.486c.938 0 1.701.763 1.701 1.701 0 .855-.636 1.558-1.458 1.677v.51a.486.486 0 1 1-.972 0v-.486h-.973a.486.486 0 1 1 0-.972h1.702a.73.73 0 0 0 0-1.458zm-.243 6.805c4.02 0 7.291-3.27 7.291-7.291C14.583 3.27 11.313 0 7.292 0 3.27 0 0 3.27 0 7.292c0 4.02 3.27 7.291 7.292 7.291z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M16.528 18.472a.972.972 0 0 0-.972.972v.687l-5.172-4.802a.971.971 0 0 0-1.245-.065l-3.25 2.437-4.266-3.84a.973.973 0 0 0-1.301 1.445l4.86 4.375a.972.972 0 0 0 1.234.055l3.24-2.43 4.396 4.083h-.44a.972.972 0 1 0 0 1.944h2.916a.972.972 0 0 0 .972-.972v-2.917a.972.972 0 0 0-.972-.972z"/></g></g></g></g></g></svg>
                                                    </span>
                                <span class="user-account-menu--text">Вывод средств</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/profile/documents']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/profile/documents']) ?>">
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19"
                                                             viewBox="0 0 16 19"><g><g><g><g><path fill="#011241"
                                                                                                   d="M4.174 18.783v-.696h1.391v.696z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M1.391 16v-1.391h.696V16z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M11.13 4.87h3.479L10.435 0v4.174c0 .417.348.696.695.696z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M6.26 18.783v-.696h1.392v.696z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M2.087 17.391v-.695h-.696v.695c0 .766.626 1.392 1.392 1.392h.695v-.696h-.695a.697.697 0 0 1-.696-.696z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M14.609 5.565H11.13a1.395 1.395 0 0 1-1.39-1.391V0H2.782C2.017 0 1.39.626 1.39 1.391v9.044H14.61z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M1.391 13.913v-1.391h.696v1.391z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M13.913 16v-1.391h.696V16z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M13.913 13.913v-1.391h.696v1.391z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M15.304 9.74v1.39H.696V9.74H0v3.477h.696v-1.39h14.608v1.39H16V9.74z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M13.913 17.391c0 .418-.278.696-.696.696h-.695v.696h.695c.766 0 1.392-.626 1.392-1.392v-.695h-.696z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M8.348 18.783v-.696h1.391v.696z"/></g><g><path
                                                                                    fill="#011241"
                                                                                    d="M10.435 18.783v-.696h1.391v.696z"/></g></g></g></g></svg>
                                                                                                    </span>
                                <span class="user-account-menu--text">Сканкопии и документы</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/register/index']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/register/index']) ?>">
                                                                                                    <span class="icon">
                                                                                                     <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                          width="18"
                                                                                                          height="19"
                                                                                                          viewBox="0 0 18 19"
                                                                                                          fill="none">
                                                                                                     <g clip-path="url(#clip0)">
                                                                                                        <path d="M16.2642 12.9819V12.6729C16.2704 12.3849 16.219 12.0985 16.1131 11.8306C16.0071 11.5627 15.8487 11.3187 15.6472 11.1128C15.4457 10.9069 15.2051 10.7433 14.9396 10.6316C14.674 10.5199 14.3888 10.4624 14.1007 10.4624C13.8126 10.4624 13.5274 10.5199 13.2618 10.6316C12.9963 10.7433 12.7557 10.9069 12.5542 11.1128C12.3526 11.3187 12.1943 11.5627 12.0883 11.8306C11.9824 12.0985 11.931 12.3849 11.9372 12.6729V12.9819H10.7002V18.5459H17.5002V12.9819H16.2642ZM12.5552 12.6729C12.5552 12.263 12.718 11.8699 13.0079 11.5801C13.2977 11.2902 13.6908 11.1274 14.1007 11.1274C14.5106 11.1274 14.9037 11.2902 15.1935 11.5801C15.4834 11.8699 15.6462 12.263 15.6462 12.6729V12.9819H12.5552V12.6729ZM16.8822 17.9279H11.3182V13.5999H16.8822V17.9279Z"
                                                                                                              fill="#011241"/>
                                                                                                        <path d="M14.1 14.5269C13.7995 14.5266 13.5092 14.6359 13.2835 14.8345C13.0579 15.033 12.9125 15.307 12.8746 15.6051C12.8367 15.9032 12.9089 16.205 13.0776 16.4536C13.2463 16.7023 13.4999 16.8809 13.791 16.9559V17.3089C13.791 17.3908 13.8235 17.4694 13.8815 17.5274C13.9394 17.5853 14.018 17.6179 14.1 17.6179C14.1819 17.6179 14.2605 17.5853 14.3185 17.5274C14.3764 17.4694 14.409 17.3908 14.409 17.3089V16.9559C14.7 16.8809 14.9536 16.7023 15.1224 16.4536C15.2911 16.205 15.3632 15.9032 15.3253 15.6051C15.2874 15.307 15.142 15.033 14.9164 14.8345C14.6908 14.6359 14.4005 14.5266 14.1 14.5269V14.5269ZM14.1 16.3819C13.9777 16.3819 13.8583 16.3456 13.7566 16.2777C13.655 16.2098 13.5758 16.1133 13.529 16.0004C13.4822 15.8874 13.47 15.7632 13.4938 15.6433C13.5177 15.5234 13.5765 15.4133 13.663 15.3269C13.7494 15.2404 13.8595 15.1816 13.9794 15.1577C14.0993 15.1339 14.2235 15.1461 14.3365 15.1929C14.4494 15.2397 14.5459 15.3189 14.6138 15.4205C14.6817 15.5221 14.718 15.6416 14.718 15.7639C14.7177 15.9277 14.6525 16.0847 14.5367 16.2006C14.4208 16.3164 14.2638 16.3816 14.1 16.3819Z"
                                                                                                              fill="#011241"/>
                                                                                                        <path d="M17.191 0.875C17.1905 0.643098 17.0981 0.420845 16.9341 0.256865C16.7702 0.0928851 16.5479 0.000528253 16.316 0L1.376 0C1.14392 0.000264021 0.921415 0.0925042 0.757219 0.256513C0.593023 0.420521 0.500529 0.642925 0.5 0.875V8.964H17.191V0.875ZM11.627 4.475C11.6267 4.76215 11.5125 5.03746 11.3095 5.2405C11.1065 5.44355 10.8311 5.55774 10.544 5.558H7.144C6.85824 5.55695 6.58445 5.4431 6.38219 5.24122C6.17994 5.03934 6.06558 4.76576 6.064 4.48V4.018C6.064 3.93605 6.09656 3.85745 6.1545 3.7995C6.21245 3.74156 6.29105 3.709 6.373 3.709C6.45495 3.709 6.53355 3.74156 6.5915 3.7995C6.64945 3.85745 6.682 3.93605 6.682 4.018V4.48C6.68226 4.60324 6.73134 4.72137 6.81849 4.80851C6.90563 4.89566 7.02376 4.94474 7.147 4.945H10.547C10.6703 4.945 10.7886 4.89601 10.8758 4.8088C10.963 4.7216 11.012 4.60333 11.012 4.48V4.018C11.012 3.93605 11.0446 3.85745 11.1025 3.7995C11.1605 3.74156 11.239 3.709 11.321 3.709C11.403 3.709 11.4815 3.74156 11.5395 3.7995C11.5974 3.85745 11.63 3.93605 11.63 4.018L11.627 4.475Z"
                                                                                                              fill="#011241"/>
                                                                                                        <path d="M14.1 9.58203H0.5V17.67C0.500529 17.9021 0.593023 18.1245 0.757219 18.2885C0.921415 18.4525 1.14392 18.5448 1.376 18.545H9.776V14.527H7.147C6.85985 14.5268 6.58454 14.4126 6.3815 14.2095C6.17845 14.0065 6.06426 13.7312 6.064 13.444V12.982C6.064 12.9001 6.09656 12.8215 6.1545 12.7635C6.21245 12.7056 6.29105 12.673 6.373 12.673C6.45495 12.673 6.53355 12.7056 6.5915 12.7635C6.64945 12.8215 6.682 12.9001 6.682 12.982V13.444C6.68226 13.5673 6.73134 13.6854 6.81849 13.7725C6.90563 13.8597 7.02376 13.9088 7.147 13.909H9.773V12.109H11.073C11.2133 11.4056 11.5901 10.7713 12.1407 10.3116C12.6914 9.85187 13.3828 9.59443 14.1 9.58203V9.58203Z"
                                                                                                              fill="#011241"/>
                                                                                                    </g>
                                                                                                    <defs>
                                                                                                        <clipPath
                                                                                                                id="clip0">
                                                                                                            <rect width="17"
                                                                                                                  height="18.545"
                                                                                                                  fill="white"
                                                                                                                  transform="translate(0.5)"/>
                                                                                                        </clipPath>
                                                                                                    </defs>
                                                                                                </svg>
                                                                                            </span>
                                <span class="user-account-menu--text">Депозитарий / Единый реестр акционеров</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/graph/index']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/graph/index']) ?>">
                                                                                            <span class="icon">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                     width="18"
                                                                                                     height="19"
                                                                                                     viewBox="0 0 18 19"
                                                                                                     fill="none">
                                                                                             <g clip-path="url(#clip0)">
                                                                                              <path id="Path_425"
                                                                                                    data-name="Path 425"
                                                                                                    d="M32.406,7.5a1.4,1.4,0,0,0,.973-.4l1.388.694a1.377,1.377,0,0,0-.017.17,1.406,1.406,0,0,0,2.813,0,1.389,1.389,0,0,0-.141-.6L39.3,5.484a1.389,1.389,0,0,0,.6.141,1.408,1.408,0,0,0,1.406-1.406,1.385,1.385,0,0,0-.07-.417l1.635-1.226a1.405,1.405,0,1,0-.628-1.17,1.385,1.385,0,0,0,.07.417L40.685,3.049a1.4,1.4,0,0,0-2.044,1.772L36.759,6.7a1.382,1.382,0,0,0-1.576.254L33.8,6.264a1.377,1.377,0,0,0,.017-.17A1.406,1.406,0,1,0,32.406,7.5Zm0,0"
                                                                                                    transform="translate(-30.031)"
                                                                                                    fill="#011241"/>
                                                                                              <path id="Path_426"
                                                                                                    data-name="Path 426"
                                                                                                    d="M15.531,160.375h-.5v-9.906a.469.469,0,0,0-.469-.469H12.688a.469.469,0,0,0-.469.469v9.906h-.938v-7.094a.469.469,0,0,0-.469-.469H8.938a.469.469,0,0,0-.469.469v7.094H7.531v-3.344a.469.469,0,0,0-.469-.469H5.188a.469.469,0,0,0-.469.469v3.344H3.781v-5.219a.469.469,0,0,0-.469-.469H1.438a.469.469,0,0,0-.469.469v5.219h-.5a.469.469,0,1,0,0,.938H15.531a.469.469,0,1,0,0-.937Zm0,0"
                                                                                                    transform="translate(0 -145.312)"
                                                                                                    fill="#011241"/>
                                                                                          </g>
                                                                                          <defs>
                                                                                            <clipPath id="clip0">
                                                                                                <rect width="17"
                                                                                                      height="18.545"
                                                                                                      fill="white"
                                                                                                      transform="translate(0.5)"/>
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                    </svg>
                                                                                </span>
                                <span class="user-account-menu--text">Аналитический центр</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/default/credit']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/default/credit']) ?>">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="18"
                                             height="19"
                                             viewBox="0 0 18 19"
                                             fill="none">
                                    <g id="pay" transform="translate(0 -55.05)">
    <g id="Group_335" data-name="Group 335" transform="translate(0 55.05)">
      <g id="Group_334" data-name="Group 334" transform="translate(0 0)">
        <path id="Path_427" data-name="Path 427"
              d="M13.6,55.05H.986A1,1,0,0,0,0,56.058v7.758a.977.977,0,0,0,.986.964H1.5V58.454a1.87,1.87,0,0,1,1.88-1.862h11.2v-.533A.993.993,0,0,0,13.6,55.05Z"
              transform="translate(0 -55.05)" fill="#011241"/>
      </g>
    </g>
    <g id="Group_337" data-name="Group 337" transform="translate(12.038 63.993)">
      <g id="Group_336" data-name="Group 336">
        <path id="Path_428" data-name="Path 428"
              d="M276.336,258.322a.706.706,0,0,0-1,.088.468.468,0,0,1-.066.066.441.441,0,0,1-.621-.066.709.709,0,1,0-.542,1.162.689.689,0,0,0,.546-.255.437.437,0,0,1,.339-.159.425.425,0,0,1,.339.154.611.611,0,0,0,.092.092.706.706,0,1,0,.907-1.083Z"
              transform="translate(-273.399 -258.15)" fill="#011241"/>
      </g>
    </g>
    <g id="Group_339" data-name="Group 339" transform="translate(2.378 57.472)">
      <g id="Group_338" data-name="Group 338" transform="translate(0 0)">
        <path id="Path_429" data-name="Path 429"
              d="M67.618,110.049H55a.989.989,0,0,0-1,.982v.647H68.622v-.647A.99.99,0,0,0,67.618,110.049Z"
              transform="translate(-54 -110.049)" fill="#011241"/>
      </g>
    </g>
    <g id="Group_341" data-name="Group 341" transform="translate(2.378 59.981)">
      <g id="Group_340" data-name="Group 340" transform="translate(0 0)">
        <rect id="Rectangle_484" data-name="Rectangle 484" width="15" height="1" transform="translate(-0.378 0.068)"
              fill="#011241"/>
      </g>
    </g>
    <g id="Group_343" data-name="Group 343" transform="translate(2.378 62.007)">
      <g id="Group_342" data-name="Group 342" transform="translate(0 0)">
        <path id="Path_430" data-name="Path 430"
              d="M54,213.05v4.187a1.006,1.006,0,0,0,1,1.008H67.614a1.013,1.013,0,0,0,1-1.008V213.05Zm13.469,3.584a1.593,1.593,0,0,1-2.21.427,1.569,1.569,0,0,1-.889.273,1.592,1.592,0,0,1,0-3.183,1.569,1.569,0,0,1,.889.273,1.592,1.592,0,0,1,2.21,2.21Z"
              transform="translate(-54 -213.05)" fill="#011241"/>
      </g>
    </g>
  </g>
                                  <defs>
                                    <clipPath id="clip0"><rect width="17" height="18.545" fill="white"
                                                               transform="translate(0.5)"/>
                                    </clipPath>
                                </defs>
                                    </svg>
                                </span>
                                <span class="user-account-menu--text">Кредитование</span>
                            </a>
                        </li>
                        <li class="user-account-menu-item <?= Url::to(['cabinet/default/ndfl']) == $active_url ? 'vd-active' : '' ?>">
                            <a href="<?= Url::to(['cabinet/default/ndfl']) ?>">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="18"
                                             height="19"
                                             viewBox="0 0 18 19"
                                             fill="none">
                                             <defs><style>.a{fill:#011241;}</style></defs>

<g transform="translate(-0.012)"><g transform="translate(9.979 9.97)">
	<path class="a" d="M301.167,300.244a.987.987,0,1,0,.987.987A.988.988,0,0,0,301.167,300.244Z" transform="translate(-300.18 -300.244)"/>
</g>

<g transform="translate(5.06 5.051)">
	<path class="a" d="M153.027,152.116a.987.987,0,1,0,.987.987A.988.988,0,0,0,153.027,152.116Z" transform="translate(-152.04 -152.116)"/>
</g>
<g transform="translate(0.012)"><g transform="translate(0)">
	<path class="a" d="M8.512,0a8.5,8.5,0,1,0,8.5,8.5A8.51,8.51,0,0,0,8.512,0ZM6.047,3.988A2.05,2.05,0,1,1,4,6.038,2.053,2.053,0,0,1,6.047,3.988ZM5.424,12.34a.532.532,0,1,1-.752-.752L11.6,4.66a.532.532,0,0,1,.752.752Zm5.542.666a2.05,2.05,0,1,1,2.05-2.05A2.053,2.053,0,0,1,10.966,13.007Z" transform="translate(-0.012)"/>
	</g>
	</g>
	</g>
                                                                         <defs>
                                    <clipPath id="clip0"><rect width="17" height="18.545" fill="white"
                                                               transform="translate(0.5)"/>
                                    </clipPath>
                                </defs>
                                    </svg>
                                </span>
                                <span class="user-account-menu--text">НДФЛ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-12 user-account-index">
                <?= $content ?>
            </div>
        </div>
    </div>


</main>

<?= $this->render('_footer'); ?>


<?php $this->endContent() ?>










