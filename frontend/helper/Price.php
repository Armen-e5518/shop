<?php

namespace frontend\helper;

use common\models\Categories;
use common\models\ProductImages;
use common\models\Products;
use Yii;
use yii\helpers\Html;


/**
 * Site controller
 */
class Price
{
    public static function getNormalPrice($price)
    {
        $prc = 5;
        if($price > 10000){
            $prc = 7;
        }
        if($price > 50000){
            $prc = 12;
        }
        if($price > 100000){
            $prc = 15;
        }
        $price_old = $price + round($price * $prc / 100);
        $good = round(substr($price, -2) / 10) * 10;
        return substr($price_old, 0, -2) . $good;
    }

    public static function getBigPrice($price)
    {
        $price_old = $price + round($price * 27 / 100);
        $good = round(substr($price, -2) / 10) * 10;
        return substr($price_old, 0, -2) . $good;
    }
}