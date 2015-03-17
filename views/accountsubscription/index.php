<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountsubscriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Subscriptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-subscription-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Account Subscription', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'account_id',
            'package_id',
            'subscription_date',
            'expiry_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
