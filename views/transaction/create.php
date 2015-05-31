<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountSignupTransaction */

$this->title = 'Account Sign Up';
$this->params['breadcrumbs'][] = ['label' => 'Account Signup Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="panel-body">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
