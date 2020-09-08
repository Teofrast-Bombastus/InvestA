<?php

namespace common\bootstrap;


use League\Flysystem\Adapter\Ftp;
use League\Flysystem\Filesystem;
use shop\dispatchers\AsyncEventDispatcher;
use shop\dispatchers\DeferredEventDispatcher;
use shop\dispatchers\EventDispatcher;
use shop\dispatchers\SimpleEventDispatcher;
use shop\entities\behaviors\FlySystemImageUploadBehavior;
use shop\entities\user\events\UserResetPasswordRequested;
use shop\entities\user\events\UserSetAccountNumber;
use shop\jobs\AsyncEventJobHandler;
use shop\listeners\user\UserResetPasswordRequestedListener;
use shop\listeners\user\UserSetAccountNumberListener;
use shop\listeners\user\UserSignupRequestedListener;
use shop\entities\user\events\UserSignUpRequested;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\ErrorHandler;
use yii\caching\Cache;
use yii\di\Container;
use yii\di\Instance;
use yii\mail\MailerInterface;
use yii\rbac\ManagerInterface;
use yiidreamteam\upload\ImageUploadBehavior;
use yii\queue\Queue;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {

        $container = Yii::$container;

//        $container->setSingleton(Client::class, function () use ($app){
//            return ClientBuilder::create()->build();
//        });

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });

        $container->setSingleton(ErrorHandler::class, function () use ($app) {
            return $app->errorHandler;
        });

        $container->setSingleton(Queue::class, function () use ($app) {
            return $app->get('queue');
        });

        $container->setSingleton(Cache::class, function () use ($app) {
            return $app->cache;
        });

        $container->setSingleton(ManagerInterface::class, function () use ($app) {
            return $app->authManager;
        });


//        $container->setSingleton(Cart::class, function () use ($app) {
//            return new Cart(
////                new SessionStorage('cart', Yii::$app->session),
//            new CookieStorage('cart', 3600),
//                new DynamicCost(new SimpleCost())
//            );
//        });


        $container->setSingleton(EventDispatcher::class, DeferredEventDispatcher::class);

        $container->setSingleton(DeferredEventDispatcher::class, function (Container $container) {
            return new DeferredEventDispatcher(new AsyncEventDispatcher($container->get(Queue::class)));
        });


        $container->setSingleton(SimpleEventDispatcher::class, function (Container $container) {
            return new SimpleEventDispatcher($container, [
                UserSignUpRequested::class => [UserSignupRequestedListener::class],
                UserResetPasswordRequested::class => [UserResetPasswordRequestedListener::class],
                UserSetAccountNumber::class => [UserSetAccountNumberListener::class],
//                OrderCreateRequested::class => [OrderCreateRequestedListener::class],
//                EntityPersisted::class => [
//                    ProductSearchPersistListener::class,
//                ],
//                EntityRemoved::class => [
//                    ProductSearchRemoveListener::class,
//                ],
            ]);
        });

        $container->setSingleton(AsyncEventJobHandler::class, [], [
            Instance::of(SimpleEventDispatcher::class)
        ]);

        /*
        $container->setSingleton(Filesystem::class, function () use ($app) {
            return new Filesystem(new Ftp($app->params['ftp']));
        });

        $container->set(ImageUploadBehavior::class, FlySystemImageUploadBehavior::class);
        */
    }
}