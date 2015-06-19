<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'package_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'emails_allowed')->textInput() ?>

    <?= $form->field($model, 'quota_allowed')->textInput() ?>
    
    <?= $form->field($model, 'price')->textInput() ?>
    
    <?= $form->field($model, 'package_slug')->textInput() ?>
    
    <?= $form->field($model, 'is_public')->radioList([true => 'Yes', false => 'No']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
