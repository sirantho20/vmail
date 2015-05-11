<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mailbox */

$this->title = 'Update Mailbox: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mailboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mailbox-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
