<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountSubscription */

$this->title = 'Create Account Subscription';
$this->params['breadcrumbs'][] = ['label' => 'Account Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-subscription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
