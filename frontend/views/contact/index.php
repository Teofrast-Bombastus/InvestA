<?php

/* @var $this yii\web\View */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;

$this->params['contact-page'] = 'contact-page';

use shop\helpers\ContactHelper;
use yii\helpers\Html;
?>


<div class="container headline-container">
    <div class="h1-wrapper">
        <h1>
            Контакты
        </h1>
    </div>
</div>
<section class="main-contacts">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 col-12">
                <div class="main-contacts-item">
                    <div class="main-contacts-item-headline">
                        Адрес офиса:
                    </div>
                    <p>
                        <?= Html::encode(ContactHelper::getAddress()->text) ?>
                    </p>
                </div>
                <div class="main-contacts-item">
                    <div class="main-contacts-item-headline">
                        Телефон:
                    </div>
                    <p>
                        <a href="tel:<?= str_replace([' ', '-', '_', '(', ')'], '', Html::encode(ContactHelper::getPhone()->text)); ?>"> <?= Html::encode(ContactHelper::getPhone()->text) ?> </a>
                    </p>
                </div>
                <div class="main-contacts-item">
                    <div class="main-contacts-item-headline">
                        E-mail:
                    </div>
                    <p>
                        <a href="mailto:<?= Html::encode(ContactHelper::getEmail()->email) ?>"><?= Html::encode(ContactHelper::getEmail()->email) ?></a>
                    </p>
                </div>

            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-12 time-work-col">
                <div class="main-contacts-item-headline">
                    Рабочие часы
                </div>
                <div class="time-work-wrapper">
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Понедельник
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            9:00 - 20:00
                        </div>
                    </div>
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Вторник
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            9:00 - 20:00
                        </div>
                    </div>
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Среда
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            9:00 - 20:00
                        </div>
                    </div>
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Четверг
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            9:00 - 20:00
                        </div>
                    </div>
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Пятница
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            9:00 - 20:00
                        </div>
                    </div>
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Суббота
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            9:00 - 20:00
                        </div>
                    </div>
                    <div class="time-work-wrapper-item">
                        <div class="time-work-wrapper-day">
                            Перерыв в рабочие дни
                        </div>
                        <div class="time-work-wrapper-separator"></div>
                        <div class="time-work-wrapper-time">
                            с 13:00 - 14:00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="map">
</section>




