<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'name',
//            'text:ntext',
//            'description:ntext',
            'stars',
            'price',

            //'state',
            //'views',
            //'buy_count',
           [
              'attribute' => 'Products',
              'format' => 'html',
              'value' => function ($data) {
                 $imgs= \common\models\ProductImages::GetImgs($data->id);
                 $s = '';
                 foreach ($imgs as $k=>$img) {
                    ++$k;
                    $s .= "<img width='50px' src='$img->img'</img>";
                 }
                 return $s;
              },
           ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
