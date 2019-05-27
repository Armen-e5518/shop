<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

   <?= $form->field($model, 'category_id')->dropDownList(\common\models\Categories::GetAll(), []) ?>

   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

   <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

   <?= $form->field($model, 'stars')->textInput() ?>

   <?= $form->field($model, 'price')->textInput() ?>

   <?= $form->field($model, 'big_price')->textInput() ?>

   <?= $form->field($model, 'state')->textInput() ?>

   <?= $form->field($model, 'views')->textInput() ?>

   <?= $form->field($model, 'buy_count')->textInput() ?>

   <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

   <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
   </div>

   <?php ActiveForm::end(); ?>

</div>
