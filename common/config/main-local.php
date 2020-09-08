<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=forex',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'messageConfig' => [
                //'from' => ['mkvsgroup@gmail.com' => 'investAktivGroup']
                'from' => ['investaktiv2010@gmail.com' => 'investAktivGroup']
            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => '',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0, // по счету
        ],
        'interkassa' => [
            //https://mkvsgroup.com/payment/interkassa/result
            //https://mkvsgroup.com/payment/interkassa/success
            //https://mkvsgroup.com/payment/interkassa/fail
            'class' => 'lan143\interkassa\Component',
            'co_id' => '5d1275f41ae1bdc09c8b4568', // Cashbox identifier
            'secret_key' => '', // Cashbox secret key
            'test_key' => '7RSzcHRgmXFUWpbK', // Cashbox test secret key
            'sign_algo' => 'md5', // Sign algoritm. Allow: md5, sha1
            'api_user_id' => '', // Api user id
            'api_user_key' => '' // Api user secret key
        ],
    ],
];
