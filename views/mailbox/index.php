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
        'summary' => '',
        'tableOptions' => ['class' => 'table table-condensed table-striped table-hover'],
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
                'header' => 'Quota',
                'format' => 'html',
                'value' => function($data){
                    return '<div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                          60%
                        </div>
                      </div>';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'reset' => function($url, $model, $key){
                            return '<a title = "Reset Password" href="'.Yii::$app->urlManager->createAbsoluteUrl(['mailbox/resetpassword','mailbox' => $model->username]).'" class = "btn btn-xs btn-warning" >'.'<i class="fa fa-key"></i>'.'</a>';
                        },
                                
                    'update' => function($url, $model, $key){
                         return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, ['class' => 'btn btn-xs btn-info', 'title' => 'Update Mailbox']);   
                    }
                ],
                'template' => '{update} {reset}'
            ],
        ],
    ]); ?>
    </div>
</div>
