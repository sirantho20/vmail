<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha

/* @var $this yii\web\View */
/* @var $model app\models\AccountSignupTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-signup-transaction-form">

    <?php $form = ActiveForm::begin([
        'action' => yii\helpers\Url::to(['transaction/create']),
    ]); ?>
    
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'account_name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'domain')->textInput(['maxlength' => true])->hint('email accounts will be created on this domain') ?></div>
    </div>
    
    <?= $form->field($model, 'package_id')->dropDownList(yii\helpers\ArrayHelper::map(app\models\AccountPackage::find()->where(['is_public' => true])->all(), 'id', 'package_name')) ?>
    
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?></div>
    </div>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'captcha')->widget(Captcha::classname()) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Sign Up Now' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
