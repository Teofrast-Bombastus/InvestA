<?php

namespace shop\useCases\shop;


use shop\forms\shop\AskQuestionForm;
use shop\forms\shop\StrategyForm;
use Yii;
use yii\mail\MailerInterface;

class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }


    public function sendQuestion(AskQuestionForm $form) :void
    {
        $send = $this
            ->mailer
            ->compose(
                ['html' => 'shop/ask-question/mail-html', 'text' => 'shop/ask-question/mail-text'],
                ['username' => $form->username, 'phone' => $form->phone, 'email' => $form->email, 'text' => $form->text]
            )
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Заявка c проекта ' . Yii::$app->params['project_name'])
            ->send();
        if (!$send){
            throw new \RuntimeException('Sending error.');
        }
    }


    public function sendStrategy(StrategyForm $form) :void
    {
        $send = $this
            ->mailer
            ->compose(
                ['html' => 'shop/strategy/mail-html', 'text' => 'shop/strategy/mail-text'],
                ['strategyName' => $form->strategyName, 'phone' => $form->phone]
            )
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Заявка c проекта ' . Yii::$app->params['project_name'])
            ->send();
        if (!$send){
            throw new \RuntimeException('Sending error.');
        }
    }

}