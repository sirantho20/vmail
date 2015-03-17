<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MailboxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mailbox-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'language') ?>

    <?= $form->field($model, 'storagebasedirectory') ?>

    <?php // echo $form->field($model, 'storagenode') ?>

    <?php // echo $form->field($model, 'maildir') ?>

    <?php // echo $form->field($model, 'quota') ?>

    <?php // echo $form->field($model, 'domain') ?>

    <?php // echo $form->field($model, 'transport') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'rank') ?>

    <?php // echo $form->field($model, 'employeeid') ?>

    <?php // echo $form->field($model, 'isadmin') ?>

    <?php // echo $form->field($model, 'isglobaladmin') ?>

    <?php // echo $form->field($model, 'enablesmtp') ?>

    <?php // echo $form->field($model, 'enablesmtpsecured') ?>

    <?php // echo $form->field($model, 'enablepop3') ?>

    <?php // echo $form->field($model, 'enablepop3secured') ?>

    <?php // echo $form->field($model, 'enableimap') ?>

    <?php // echo $form->field($model, 'enableimapsecured') ?>

    <?php // echo $form->field($model, 'enabledeliver') ?>

    <?php // echo $form->field($model, 'enablelda') ?>

    <?php // echo $form->field($model, 'enablemanagesieve') ?>

    <?php // echo $form->field($model, 'enablemanagesievesecured') ?>

    <?php // echo $form->field($model, 'enablesieve') ?>

    <?php // echo $form->field($model, 'enablesievesecured') ?>

    <?php // echo $form->field($model, 'enableinternal') ?>

    <?php // echo $form->field($model, 'enabledoveadm') ?>

    <?php // echo $form->field($model, 'enablelib-storage') ?>

    <?php // echo $form->field($model, 'enablelmtp') ?>

    <?php // echo $form->field($model, 'lastlogindate') ?>

    <?php // echo $form->field($model, 'lastloginipv4') ?>

    <?php // echo $form->field($model, 'lastloginprotocol') ?>

    <?php // echo $form->field($model, 'disclaimer') ?>

    <?php // echo $form->field($model, 'allowedsenders') ?>

    <?php // echo $form->field($model, 'rejectedsenders') ?>

    <?php // echo $form->field($model, 'allowedrecipients') ?>

    <?php // echo $form->field($model, 'rejectedrecipients') ?>

    <?php // echo $form->field($model, 'settings') ?>

    <?php // echo $form->field($model, 'passwordlastchange') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'modified') ?>

    <?php // echo $form->field($model, 'expired') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'local_part') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
