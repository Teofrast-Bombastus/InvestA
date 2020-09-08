<?php

use yii\helpers\Url;

/* @var  $this yii\web\View; */
/* @var  $model shop\forms\user\OrderForm; */

$this->title = 'Пополнить счет';
$this->params['active_url'] = Url::to(['cabinet/cash/input']);

?>

<h1>
    Воспользуйтесь системой пополнения счета через наших партнеров
</h1>
<div class="partner-block">
    <div class="row">
        <div class="col-md-4">
            <a href="https://ww-pay.com/exchange/qiwirub-to-bitcoin">
                <div class="cash-partner-block">
                    <img src="/img/cash/wwpay.png" width="143" height="80" alt="">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="https://24paybank.net/qiwi-to-bitcoin.html">
                <div class="cash-partner-block pay-bank">
                    <img src="/img/cash/24.png" width="143" height="80" alt="">
                </div>
            </a>
        </div>
        <div class="col-md-4 ">
            <a href="https://www.netex24.net/#/ru/?partner=5002&source=74&target=134">
                <div class="cash-partner-block xnetex">
                    <img src="/img/cash/xnetex.png" width="143" height="80" alt="">
                </div>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <a href="https://60cek.org/">
                <div class="cash-partner-block sec-60">
                    <img src="/img/cash/60sec.png" width="143" height="80" alt="">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="https://xchange.cash/">
                <div class="cash-partner-block change">
                    <img src="/img/cash/change.png" width="143" height="80" alt="">
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 text-center ">
            <h5 class="bitcoin-address">Это ваш личный депозитный BITCOIN адрес</h5>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-12 center-block qr-code-img">
            <img src="/img/cash/qr-code.jpg" alt="">
        </div>

    </div>
    <div class="qr-code">
        <span class="qr-code-number qr-code-number-class" id="qr-code-number">3NpuWSCpPksiXrcajEZfYsXekZcxSrpnuK</span>
        <span class="btn-copy-qr-code" title="Скопировать">
                <img src="/img/cash/sheet.png" alt="">
            </span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Инструкция пополнения счета:</h4>
            <div>
                <div class="text-inst">
                    1. Создайте (Войдите в) личный Qiwi кошелек
                </div>
                <a href="https://qiwi.com/">
                    <img src="/img/cash/qiwi.jpg" width="82" height="47" alt="">
                </a>
            </div>
            <div class="text-inst-2">
                2. Пополните личный Qiwi кошелек (Банковской картой без комиссий)
            </div>
            <div class="text-inst-2">
                3. Воспользуйтесь системой пополнения счета со своего Qiwi кошелька через наших партнеров >> WWpay,
                24payBank, Xnetex, 60cek, Xchange.
            </div>
        </div>
    </div>
</div>

<div class="old-div hidden" style="display: none">
    <h1>Здесь Вы можете пополнить свой счет</h1>


    <!--<div class="open-account-wrap input-money">-->
    <!--    --><?php //$form = ActiveForm::begin(['id' => 'form-login-page']); ?>
    <!--    <div class="open-depo-min-wrapper-form">-->
    <!--        <div class="profile-info-page-form-block">-->
    <!--            --><?php //= $form->field($model, 'amount')->textInput(["class" => "input", "placeholder" => $model->getAttributeLabel('amount') . ', ₽'])->label(false) ?>
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="submit_btn_wrapper">-->
    <!--        <p class="submit_left">-->
    <!--            <button type="submit" class="button">-->
    <!--                Отправить-->
    <!--                <span class="icon">-->
    <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>-->
    <!--                </span>-->
    <!--            </button>-->
    <!--        </p>-->
    <!--    </div>-->
    <!--    --><?php //ActiveForm::end() ?>
    <!--</div>-->


    <iframe width="300" height="300"
            src="https://widget.qiwi.com/widgets/middle-widget-300x300?publicKey=48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iP6z3zB99Whc8Y4JjnSLKCKdoWc1dhRzycF3Qnj251nvCEVKLHR776uh4hDA67yk8ZffXSNWeDUgeZmWjaP5ycfXExAhFQupj9u9hP9WUF8"
            allowtransparency="true" scrolling="no" frameborder="0"></iframe>

</div>
