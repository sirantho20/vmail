<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountUsers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Account Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'account_id',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'role',
            'status',
            'created_at',
            'updated_at',
            'last_login',
        ],
    ]) ?>

</div>
