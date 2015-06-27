<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MailboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailbox-index">

    <div class="panel panel-default">
  <!-- Default panel contents --><?= Html::a('<i class="ion-person-add"> New Email</i>', ['create'], ['class' => 'btn btn-sm btn-success', 'style'=> 'float: right; margin:2px;']) ?>
  <div class="panel-heading">Email Accounts </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summaryOptions' => ['style'=> 'float: right;'],
        'columns' => [
            'name',
            'username',
            [
                'header' => 'Status',
                'format' => 'html',
                'value' => function($data){
                    $label = $data['active'] == 1 ? 'active' : 'disabled';
                    $class = $label == 'active'? 'success' : 'danger';
                    return "<span class='label label-$class'>".$label.'</span>';
                },
            ],
            [
                'header' => 'Password Reset',
                'format' => 'html',
                'value' => function($data){
                    return '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['mailbox/resetpassword','mailbox' => $data['username']]).'" class = "btn btn-xs btn-warning" >'.'Reset'.'</a>';
                }
            ],
            'quota',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
    </div>
</div>
