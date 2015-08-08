<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-index">
    
  <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
  <div class="panel panel-default">
  <!-- Default panel contents --><?= Html::a('<i class="fa fa-plus"> New Account</i>', ['create'], ['class' => 'btn btn-sm btn-success', 'style'=> 'float: right; margin:2px;']) ?>
  <div class="panel-heading">Accounts </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            'name',
            'domain',
            'package.package_name',
//            [
//                'header' => 'Date Added',
//                'format' => 'html',
//                'value' => function($data){ return Yii::$app->formatter->asDate($data['date_added']);}
//            ],
            [
                'header' => 'Status',
                'format' => 'html',
                'value' => function($data){
                    $label = $data['status'] == 1 ? 'active' : 'disabled';
                    $class = $label == 'active'? 'success' : 'danger';
                    return "<span class='label label-$class'>".$label.'</span>';
                },
            ], 
            [
                'header' => 'Renewal Date',
                'format' => 'html',
                'value' => function($data){
                    $interval =  (new DateTime($data['date_added']))->diff(new DateTime($data['packagesubscription']['expiry_date']));
                    $days = $interval->format('%a');
                    if($days < 30)
                    {
                        return "<span style = 'color: red;'>".Yii::$app->formatter->asDate($data['packagesubscription']['expiry_date'], 'medium')."</span>";
                    }
                    else 
                    {
                        return "<span style = 'color: green;'>".Yii::$app->formatter->asDate($data['packagesubscription']['expiry_date'], 'medium')."</span>";
                    }
                    //return Yii::$app->formatter->asDate($data['packagesubscription']['expiry_date'], 'medium');
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); 
                ?>
</div>
</div>
