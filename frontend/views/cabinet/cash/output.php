<?php

/* @var  $this yii\web\View;*/
$this->title = 'Вывод средств';

use yii\helpers\Url;


$this->params['active_url'] = Url::to(['cabinet/cash/output']);

?>


<h1>Вывод средств</h1>

<div class="output-wrap-container">
	<div class="row output-wrap-container-text-margin">
		<div class="col-12">
			<p class="output-wrap-container-text">Выберите метод вывода средств.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 output-wrap-item">
			<a href="<?= Url::to(['output-bank-transfer']) ?>" class="output-wrap">
				<img src="/img/output-1.svg" width="70" height="70" alt="Банковский перевод">
				<span class="output-wrap-text">Банковский перевод</span>
			</a>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 output-wrap-item">
			<a href="<?= Url::to(['output-debit-credit-card']) ?>" class="output-wrap">
				<img src="/img/credit.card.svg" width="70" height="70" alt="Банковский перевод">
				<span class="output-wrap-text">На дебетовую или кредитную карту</span>
			</a>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 output-wrap-item">
			<a href="<?= Url::to(['output-e-payment']) ?>" class="output-wrap">
				<img src="/img/elpayment.svg" width="70" height="70" alt="Банковский перевод">
				<span class="output-wrap-text">Электронные платежи</span>
			</a>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 output-wrap-item">
			<a href="<?= Url::to(['output-crypto-currency']) ?>" class="output-wrap">
				<img src="/img/output-2.svg" width="70" height="70" alt="Банковский перевод">
				<span class="output-wrap-text">Криптовалюта</span>
			</a>
		</div>
	</div>
</div>


