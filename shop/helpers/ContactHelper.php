<?php

namespace shop\helpers;


use shop\entities\other\contacts\Address;
use shop\entities\other\contacts\Email;
use shop\entities\other\contacts\Phone;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ContactHelper
{

    public static function getAddress(): Address
    {
//        return Yii::$app->cache->getOrSet(Address::class, function () {
            return Address::findOne(1);
//        },1200);
    }

    public static function getEmail(): Email
    {
//        return Yii::$app->cache->getOrSet(Email::class, function () {
            return Email::findOne(1);
//        },1200);
    }

    public static function getPhone(): Phone
    {
//        return Yii::$app->cache->getOrSet(Phone::class, function () {
            return Phone::findOne(1);
//        },1200);
    }



}