<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Mailbox */

$this->title = 'Update Mailbox: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mailboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->username]];
$this->params['breadcrumbs'][] = 'Update';
?>



    <div class="panel panel-default">
  <!-- Default panel contents --><?php // Html::a('<i class="ion-person-add"> New Email</i>', ['create'], ['class' => 'btn btn-sm btn-success', 'style'=> 'float: right; margin:2px;']) ?>
  <div class="panel-heading">Mailbox Update </div>
  <div style="padding: 10px;">

    <?= 
 Tabs::widget([
     'headerOptions' => ['class'=>'warning'],
     'itemOptions' => ['class'=>'danger'],
     'options' => ['class'=>'danger'],
     'items' => [
        [
            'label' => 'Details',
            'content' => $this->render('_form',['model'=>$model]),
            'active' => true
        ],
        [
            'label' => 'Alias',
            'content' => ''
        ],
     ]
 ]);
    ?>
  </div>
</div>
    
