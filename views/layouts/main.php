<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Alert;
use yii\bootstrap\ButtonDropdown;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="http://softcube.co/wp-content/uploads/2012/12/favicon.ico" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Softcube Mail Administration',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo ''.\yii\helpers\BaseHtml::img('img/icon-beta.png').'';
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => ' Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'ion-home']],
                    ['label' => ' Emails', 'url' => ['/mailbox/index'],'visible' => (!Yii::$app->user->isGuest), 'linkOptions' => ['class' => 'ion-email']],
                    ['label' => ' Accounts', 'url' =>['/account/index'], 'visible' => app\components\Mailmax::isAdmin(), 'linkOptions' => ['class' => 'ion-ios-list']],
                    ['label' => ' Users', 'url' =>['/accountusers/index'], 'visible' => app\components\Mailmax::isAdmin(), 'linkOptions' => ['class' => 'ion-ios-people']],
                    ['label' => ' Packages', 'url' =>['/accountpackage/index'],'visible' => app\components\Mailmax::isAdmin(), 'linkOptions' => ['class' => 'ion-cube']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        [
                            'label' => ' '.Yii::$app->user->identity->first_name,
                            'linkOptions' => ['class' => 'ion-person'],
                            'items' => [
                                 ['label' => ' Change Password', 'url' => ['user/changepassword'], 'linkOptions' => ['class' => 'ion-lock-combination']],
                                 '<li class="divider"></li>',
                                 ['label' => ' Sign Out', 'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post', 'class'=>'ion-power']],
                            ],
                        ],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <div class="container">
            <?php 
            
                
                    foreach (Yii::$app->session->getAllFlashes() as $key => $message)
                    {
                        
                        echo '<div class="alert alert-'.$key.' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.  $message.'
</div>';
                    } 
            ?>
            </div>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Softcube Limited <?= date('Y') ?></p>
            <p class="pull-right"></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
