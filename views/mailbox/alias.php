<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UsedQuota;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MailboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailbox-index" style="padding: 15px;">

    <?php
            Modal::begin([
            'header' => '<h2>Mailbox Alias</h2>',
            'toggleButton' => ['label' => '<i class="fa fa-plug"> Add</i>', 'tag' => 'button', 'class' => 'btn btn-info'],
            ]);
          $mod = new \app\models\Alias();
          $mod->goto = $email;
          echo  $this->render('_aliasform', ['model' => $mod ]);

Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{summary}\n{pager}",
        //'summary' => '<span class="badge">{begin} to {end} of {totalCount}</span>',
        'tableOptions' => ['class' => 'table table-condensed table-striped table-hover'],
        'summaryOptions' => ['style'=> 'float: right;'],
        'columns' => [
            'address',
            'goto',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url, $model, $key){
                        return Html::a('<i class="fa fa-trash-o"></i>', Yii::$app->urlManager->createAbsoluteUrl(['mailbox/deletealias', 'address' => $model->address,'id' => $model->goto]), ['data-confirm' => 'Alias will be permanently deleted', 'class' => 'btn btn-xs btn-danger']);
                    }
                ],
               'template' => '{delete}',
            ]
        ],
    ]); ?>
</div>
