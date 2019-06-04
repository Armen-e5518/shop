<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CheckoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Checkouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkout-index">

   <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
         ['class' => 'yii\grid\SerialColumn'],

//         'id',
         'name',
         'email:email',
         'phone',
         [
            'attribute' => 'Products',
            'format' => 'html',
            'value' => function ($data) {
               $products = \common\models\CheckoutProd::GetAllByProdId($data->id);
               $s = '';
               foreach ($products as $k => $product) {
                  ++$k;
                  $s .= "($product[count]x) <a href='/admin/products/view?id=$product[id]'>$product[name]</a><br>";
               }
               return $s;
            },
         ],
//            'notes:ntext',
         'date',
         [
            'attribute' => 'status',
            'label' => 'Shipped',
            'format' => 'html',
            'value' => function ($data) {
               return $data->status == 1
                  ? Html::a('<i class="fa fa-toggle-on" aria-hidden="true"></i>', ['switch', 'id' => $data->id])
                  : Html::a('<i class="fa fa-toggle-off" aria-hidden="true"></i>', ['switch', 'id' => $data->id]);

            },
         ],

         ['class' => 'yii\grid\ActionColumn'],
      ],
   ]); ?>
</div>
