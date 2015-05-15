<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PasswordChangeForm */
/* @var $form ActiveForm */

$this->title = 'Password Change';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-passwordchange col-lg-6 col-sm-8 col-lg-offset-3 col-sm-offset-2">
    <div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Password Change - <?= Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name ?></h2>
  </div>
  <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'current_password')->passwordInput(['class' =>'form-control']); ?>
        <?= $form->field($model, 'new_password')->passwordInput(['class' =>'form-control']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-passwordchange -->
    </div>
</div>
