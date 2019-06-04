<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Socsites */

$this->title = 'Create Socsites';
$this->params['breadcrumbs'][] = ['label' => 'Socsites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socsites-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
