<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => \yii\helpers\Url::to(['site/login']),
        'options' => ['class' => 'form-horizontal', 'style' => 'color:black'],
        'fieldConfig' => [
            'template' => "<div class=\"row col-lg-8 col-lg-offset-2\"><div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div></div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Email Address']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>

    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-mediums', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
