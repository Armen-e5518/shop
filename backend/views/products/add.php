<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1>Add product</h1>

    <div class="products-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
