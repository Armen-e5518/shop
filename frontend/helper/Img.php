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
class Img
{
    public static function getSmImg($img)
    {
        return str_replace('/big/', '/tm/', $img);
    }


}