<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountPackage */

$this->title = 'Create Account Package';
$this->params['breadcrumbs'][] = ['label' => 'Account Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-package-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
