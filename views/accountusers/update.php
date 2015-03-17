<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountUsers */

$this->title = 'Update Account Users: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Account Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
