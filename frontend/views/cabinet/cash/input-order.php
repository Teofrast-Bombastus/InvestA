<?php

/* @var  $this yii\web\View; */
/* @var  $order shop\entities\user\cabinet\Order */
$this->title = 'Пополнить счет №' . $order->user->account;

use yii\helpers\Url;

$this->params['active_url'] = Url::to(['cabinet/cash/input']);

?>


<h1><?= $this->title ?> </h1>

<div class="input-order-wrap">
	<section class="input-order-print" id="print-content">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="payment-info">
					<p>Плательщик: <span><?= $order->getFullName() ?></span></p>
					<p>Телефон: <?= $order->phone ?></p>
				</div>
				<div class="payment-info">
					<p>Метод платежа: <?= $order->payment_method ?></p>
					<p>MIR: <?= Yii::$app->formatter->asDate($order->created_at, 'php:d/m/Y') ?></p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="payment-info">
					<p>Получатель: <?= $order->recipient ?></p>
				</div>
			</div>
		</div>
		<div class="input-order-print-price">
			<table>
				<tbody>
					<tr>
						<td>Описание</td>
						<td>Price</td>
						<td>Итого</td>
					</tr>
					<tr>
						<td><?= $order->getDescription() ?></td>
						<td>Сумма</td>
						<td><?= $order->amount ?> ₽</td>
					</tr>
					<tr>
						<td></td>
						<td>Промежуточный итог</td>
						<td><?= $order->subtotal ?> ₽</td>
					</tr>
					<tr>
						<td></td>
						<td>Налог (0%)</td>
						<td><?= $order->tax ?> </td>
					</tr>
					<tr>
						<td></td>
						<td>Итого</td>
						<td><?= $order->total ?> ₽</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
    <div class="input-order-print-order">
        <button type="button" class="button-border-style print-btn">
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15"><g><g><g><g><path fill="#030104" d="M5 13h6v1H5zm0-2h6v1H5zm-1 4h8v-5H4z"/></g><g><path fill="#030104" d="M12 3V0H4v5h8z"/></g><g><path fill="#030104" d="M14 3h-1v3H3V3H2C1 3 0 4 0 5v5c0 1 1 2 2 2h1V9h10v3h1c1 0 2-1 2-2V5c0-1-1-2-2-2z"/></g></g></g></g></svg>
            </span>
            Распечатать
        </button>
        <a href="<?= Url::to(['payment/interkassa/invoice', 'id' => $order->id]) ?>" class="button" tabindex="0">
            Оплатить
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15"><g><g><g><path fill="#fff" d="M3.06 0H.1l5.916 7.35-5.916 7.44H3.06l5.916-7.44z"></path></g><g><path fill="#fff" d="M12.053 0H9.095l5.916 7.35-5.916 7.44h2.958l5.915-7.44z"></path></g><g><path fill="#fff" d="M21.046 0h-2.958l5.916 7.35-5.916 7.44h2.958l5.916-7.44z"></path></g></g></g></svg>
            </span>
        </a>
    </div>
</div>


