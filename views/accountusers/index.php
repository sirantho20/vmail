<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    
  <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
  <div class="panel panel-default">
  <!-- Default panel contents --><?= Html::a('<i class="fa fa-plus"> New Account</i>', ['create'], ['class' => 'btn btn-sm btn-success', 'style'=> 'float: right; margin:2px;']) ?>
  <div class="panel-heading">Account Users </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-condensed table-striped table-hover'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'first_name',
            'last_name',
            [
                'header' => 'Account Name',
                'value' => 'account.name',
            ],
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'role',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'last_login',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
