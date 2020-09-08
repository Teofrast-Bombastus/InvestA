<?php

use yii\helpers\Url;

/* @var  $this yii\web\View;*/
/* @var $depository shop\entities\shop\aboutUs\AboutUs */

$this->title = 'Графики';
$this->params['active_url'] = Url::to(['cabinet/graph/index']);

?>

<h1>Аналитический центр</h1>

  <p>«График  в реальном времени от ООО ИНВЕСТАКТИВ»</p>
  <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_e78d8"></div>
  <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">График AAPL</span></a> предоставлен TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "500",
  "symbol": "NASDAQ:AAPL",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "ru",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_e78d8"
}
  );
  </script>
</div>

  <p>«График рынка криптовалют»</p>
  <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Рынки криптовалют</span></a> предоставлены TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
  {
  "width": "100%",
  "height": "500",
  "defaultColumn": "overview",
  "screener_type": "crypto_mkt",
  "displayCurrency": "USD",
  "colorTheme": "light",
  "locale": "ru"
}
  </script>
</div>
<!-- TradingView Widget END -->
