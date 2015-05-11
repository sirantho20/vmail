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
            'username',
            'name',
            'active',
            'quota',
            //'language',
            //'storagebasedirectory',
            // 'storagenode',
            // 'maildir',
            // 'quota',
            // 'domain',
            // 'transport',
            // 'department',
            // 'rank',
            // 'employeeid',
            // 'isadmin',
            // 'isglobaladmin',
            // 'enablesmtp',
            // 'enablesmtpsecured',
            // 'enablepop3',
            // 'enablepop3secured',
            // 'enableimap',
            // 'enableimapsecured',
            // 'enabledeliver',
            // 'enablelda',
            // 'enablemanagesieve',
            // 'enablemanagesievesecured',
            // 'enablesieve',
            // 'enablesievesecured',
            // 'enableinternal',
            // 'enabledoveadm',
            // 'enablelib-storage',
            // 'enablelmtp',
            // 'lastlogindate',
            // 'lastloginipv4',
            // 'lastloginprotocol',
            // 'disclaimer:ntext',
            // 'allowedsenders:ntext',
            // 'rejectedsenders:ntext',
            // 'allowedrecipients:ntext',
            // 'rejectedrecipients:ntext',
            // 'settings:ntext',
            // 'passwordlastchange',
            // 'created',
            // 'modified',
            // 'expired',
            // 'active',
            // 'local_part',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
