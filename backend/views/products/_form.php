<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
$imgs = \common\models\ProductImages::GetImgs($model->id);
?>

<div class="products-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) ?>
            <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList(\common\models\Categories::GetAll(), []) ?>
            <?= $form->field($model, 'brend_id')->dropDownList(\common\models\Brend::GetAll(), []) ?>
            <?= $form->field($model, 'stars')->textInput() ?>
            <?= $form->field($model, 'price')->textInput() ?>
            <?= $form->field($model, 'big_price')->textInput() ?>
            <?= $form->field($model, 'state')->dropDownList([
                'No action',
                '-30 %',
                'New',
                'New and -30%',
            ]) ?>
            <?= $form->field($model, 'views')->textInput() ?>
            <?= $form->field($model, 'buy_count')->textInput() ?>
            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
            <?php if (!empty($imgs)): ?>
                <?php foreach ($imgs as $img): ?>
                    <img width="50px" src="<?= $img->img ?>" alt="">
                    <a href="/admin/products/delete-img?id=<?= $img->id ?>&uid=<?=$model->id?>">Delete</a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
