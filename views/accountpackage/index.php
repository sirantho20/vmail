<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountPackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    
  <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
  <div class="panel panel-default">
  <!-- Default panel contents --><?= Html::a('<i class="fa fa-plus"> New Account</i>', ['create'], ['class' => 'btn btn-sm btn-success', 'style'=> 'float: right; margin:2px;']) ?>
  <div class="panel-heading"><h4>Account Packages</h4> </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => '',
        'tableOptions' => ['class'=> 'table table-condensed table-hover'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'package_name',
            'emails_allowed:email',
            'quota_allowed',
            //'next_due_date',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
