<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alias */
/* @var $form ActiveForm */
?>
<div class="mailbox-_aliasform">

    <?php $form = ActiveForm::begin([
        'action' => ['mailbox/addalias']
    ]); ?>

        <?= $form->field($model, 'address') ?>
        <?= Html::activeHiddenInput($model, 'goto') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- mailbox-_aliasform -->
