<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/user'], 'active' => Yii::$app->controller->id == 'user'],

                    [
                        'label' => 'Пользователи',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Упр. пользователями', 'icon' => 'user', 'url' => ['user/user/index'], 'active' => (Yii::$app->controller->id == 'user/user' && in_array(Yii::$app->controller->action->id,['index', 'create', 'view','update', 'delete']))],
//                            ['label' => 'Анкеты', 'icon' => 'vcard', 'url' => ['user/profile/index'], 'active' => $this->context->id == 'user/profile'],
                            ['label' => 'Верификация', 'icon' => 'check', 'url' => ['user/user/verify-index'], 'active' => ((Yii::$app->controller->id == 'user/user' && in_array(Yii::$app->controller->action->id,['verify-index', 'documents'])) || (Yii::$app->controller->id == 'user/profile' && in_array(Yii::$app->controller->action->id,['view'])))],
                            ['label' => 'Счета Депо', 'icon' => 'shekel', 'url' => ['user/depo-account/index'], 'active' => $this->context->id == 'user/depo-account'],
                            [
                                'label' => 'Вывод средств',
                                'icon' => 'dollar',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Банковский перевод', 'icon' => 'circle', 'url' => ['user/cabinet/withdrawal/withdrawal-bank-transfer/index'], 'active' => $this->context->id == 'user/cabinet/withdrawal/withdrawal-bank-transfer'],
                                    ['label' => 'На деб/кред карту', 'icon' => 'circle', 'url' => ['user/cabinet/withdrawal/withdrawal-debit-credit-card/index'], 'active' => $this->context->id == 'user/cabinet/withdrawal/withdrawal-debit-credit-card'],
                                    ['label' => 'Электронные платежи', 'icon' => 'circle', 'url' => ['user/cabinet/withdrawal/withdrawal-e-payment/index'], 'active' => $this->context->id == 'user/cabinet/withdrawal/withdrawal-e-payment'],
                                    ['label' => 'Криптовалюта', 'icon' => 'circle', 'url' => ['user/cabinet/withdrawal/withdrawal-crypto-currency/index'], 'active' => $this->context->id == 'user/cabinet/withdrawal/withdrawal-crypto-currency'],
                                ],
                            ],
                            ['label' => 'Упр. балансом (бонусы)', 'icon' => 'euro', 'url' => ['user/bonus-account/index'], 'active' => $this->context->id == 'user/bonus-account'],
                            ['label' => 'История операций', 'icon' => 'exchange', 'url' => ['user/operations/index'], 'active' => $this->context->id == 'user/operations'],
                        ],
                    ],
                    ['label' => 'Кредитование', 'icon' => 'users', 'url' => ['user/cabinet/credit/'], 'active' => $this->context->id == 'user/cabinet/credit/'],
                    ['label' => 'НДФЛ', 'icon' => 'users', 'url' => ['user/cabinet/resident/'], 'active' => $this->context->id == 'user/cabinet/resident/'],
                    [
                        'label' => 'Кабинет пользователя',
                        'icon' => 'home',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Файлы в кабинете', 'icon' => 'file', 'url' => ['user/cabinet-file/index'], 'active' => $this->context->id == 'user/cabinet-file'],
                            ['label' => 'Депозитарий', 'icon' => 'database', 'url' => ['user/cabinet-depository/'], 'active' => $this->context->id == 'user/cabinet-depository'],
                        ],
                    ],
                    ['label' => 'Нормативные документы', 'icon' => 'tasks', 'url' => ['/shop/regulation/index'], 'active' => $this->context->id == 'shop/regulation'],
                    ['label' => 'Лицензии', 'icon' => 'id-card', 'url' => ['/shop/licence-photo/index'], 'active' => $this->context->id == 'shop/licence-photo'],
                    ['label' => 'Файлы инвестиций', 'icon' => 'money', 'url' => ['/shop/investment/index'], 'active' => $this->context->id == 'shop/investment'],
                    ['label' => 'Стратегии', 'icon' => 'arrow-up', 'url' => ['/shop/strategy/index'], 'active' => $this->context->id == 'shop/strategy'],
                    ['label' => 'Активы', 'icon' => 'bitcoin', 'url' => ['/shop/asset/index'], 'active' => $this->context->id == 'shop/asset'],
                    ['label' => 'Депозитарий', 'icon' => 'stack-exchange', 'url' => ['/shop/depository/view', 'id' => 1], 'active' => $this->context->id == 'shop/depository'],
                    ['label' => 'О нас', 'icon' => 'info', 'url' => ['/shop/about-us/view', 'id' => 1], 'active' => $this->context->id == 'shop/about-us'],
                    ['label' => 'Получения дивидендов', 'icon' => 'exchange', 'url' => ['/shop/cash-flow/view', 'id' => 1], 'active' => $this->context->id == 'shop/cash-flow'],
                    ['label' => 'Условия сотрудничества', 'icon' => 'black-tie', 'url' => ['/shop/cooperation/view', 'id' => 1], 'active' => $this->context->id == 'shop/cooperation'],
                    [
                        'label' => 'Контакты',
                        'icon' => 'address-card',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Адрес', 'icon' => 'address-book', 'url' => ['/other/contacts/address/index'], 'active' => $this->context->id == 'other/contacts/address'],
                            ['label' => 'Почта', 'icon' => 'envelope-open', 'url' => ['/other/contacts/email/index'], 'active' => $this->context->id == 'other/contacts/email'],
                            ['label' => 'Телефон', 'icon' => 'phone', 'url' => ['/other/contacts/phone/index'], 'active' => $this->context->id == 'other/contacts/phone'],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
