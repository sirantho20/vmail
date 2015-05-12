<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MailboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mailboxes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailbox-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mailbox', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
            'quota',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>

</div>
