<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UsedQuota;

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
        'layout' => "{items}\n{summary}\n{pager}",
        //'summary' => '<span class="badge">{begin} to {end} of {totalCount}</span>',
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
                                    $used = @app\models\UsedQuota::findOne(['username' => $data['username']])->bytes;
                                    $used_mb = \round((($used/1024)/1024));
                                    $percentage = ($used_mb / $data['quota']);
                                    $val = round($percentage * 100);
                                    $usage =  Yii::$app->formatter->asPercent($percentage);
                                    if($val < 60)
                                    {
                                        $class = 'success';
                                    }
                                    elseif($val > 60 && $val < 85)
                                    {
                                        $class = 'warning';
                                    }
                                    else
                                    {
                                        $class = 'danger';
                                    }
                        return '<div class="progress">
                        <div title="'.$usage.' of '.$data['quota'].'MB'.'" class="progress-bar progress-bar-'.$class.'" role="progressbar" aria-valuenow="'.$val.'" aria-valuemin="0" aria-valuemax="100" style="cursor: wait; width: '.$usage.';">
                          '.$usage.'
                        </div>
                      </div>';
                }
            ],
            [
                'header' => 'Messages',
                'format' => 'html',
                'value' => function($data){
                        return Yii::$app->formatter->asInteger(@UsedQuota::findOne(['username' => $data['username']])->messages);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'reset' => function($url, $model, $key){
                            return '<a title = "Reset Password" href="'.Yii::$app->urlManager->createAbsoluteUrl(['mailbox/resetpassword','mailbox' => $model->username]).'" class = "btn btn-xs btn-warning" >'.'<i class="fa fa-key"></i>'.'</a>';
                        },
                                
                    'update' => function($url, $model, $key){
                         return Html::a('<i class="fa fa-pencil-square-o"></i>', Yii::$app->urlManager->createAbsoluteUrl(['mailbox/update', 'id' => $model->username]), ['class' => 'btn btn-xs btn-info', 'title' => 'Update Mailbox']);   
                    },
                    
                    'delete' => function($url, $model, $key){
                         return Html::a('<i class="fa fa-trash-o"></i>', Yii::$app->urlManager->createAbsoluteUrl(['mailbox/delete', 'id' => $model->username]), ['class' => 'btn btn-xs btn-danger', 'title' => 'Delete Mailbox', 'data-confirm' => 'Mailbox will be permanently deleted']);   
                    }
                ],
                'template' => '{update} {reset} {delete}'
            ],
        ],
    ]); ?>
    </div>
</div>
