<?php

namespace shop\helpers;



use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class FileHelper
{

    public static function getExtension($fileName)
    {
        $arr = explode('.', $fileName);
        return end($arr);
    }


    public static function getIcon($fileName)
    {
        $extension = self::getExtension($fileName);

        switch ($extension){
            case 'xlsx':
                return "xls.svg";
                break;
            case 'xls':
                return "xls.svg";
                break;
            case 'docx':
                return "doc.svg";
                break;
            case 'doc':
                return "doc.svg";
                break;
            default:
                return "pdf.svg";
        }
    }

}