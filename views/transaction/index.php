<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountchSignupTransactionSear */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Signup Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-signup-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Account Signup Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'account_name',
            'domain',
            'email:email',
            'first_name',
            // 'last_name',
            // 'package_id',
            // 'transaction_date',
            // 'payment_status',
            // 'payment_date',
            // 'amount_paid',
            // 'transaction_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
