<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SocsitesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Socsites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socsites-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Socsites', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'link',
            'icon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
