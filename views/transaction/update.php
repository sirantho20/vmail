<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountSignupTransaction */

$this->title = 'Update Account Signup Transaction: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Account Signup Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-signup-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
