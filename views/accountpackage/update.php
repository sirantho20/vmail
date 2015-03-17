<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountPackage */

$this->title = 'Update Account Package: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Account Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-package-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
