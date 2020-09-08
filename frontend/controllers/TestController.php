<?php


namespace frontend\controllers;


use frontend\tests\unit\forms\ContactFormTest;
use shop\forms\shop\StrategyForm;
use shop\useCases\shop\EmailService;

class TestController extends AppController
{
    public function actionIndex()
    {
            echo "<pre>";
            print_r($_SERVER);
            echo "</pre>";

            //$emailService->sendStrategy($form);
    }
}