<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\assets\AppAsset;

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
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

    <div id="h">
        <div class="logo"><img src="http://www.softcube.co/wp-content/themes/softcube/images/logo.png" style="border: 1px solid white; border-radius: 10px; padding: 10px; background-color:rgba(255,255,255, 0.4)" /></div>
      <div class="social hidden-xs">
        <a href="https://www.facebook.com/softcubelimited"><i class="ion-social-twitter"></i></a>
        <a href="https://twitter.com/softcubelimited"><i class="ion-social-facebook"></i></a>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 centered">
            <h1>Welcome to a professional email<br/>experience. Enjoy our service</h1><br />
            <?php
                Modal::begin([
                'header' => '<div style="color: black;">Sign In</div>',
                'size' => 'SIZE_SMALL',
                'toggleButton' => ['label' => 'Sign In', 'class' => 'btn btn-conf btn-green'],
                ]);

                echo $this->render("@app/views/site/login",['model' => (new app\models\LoginForm())]);
                

                Modal::end();
            ?>
          </div>
        </div><!--/row-->
      </div><!--/container-->
    </div><!-- /H -->

    <div class="container ptb">
      <div class="row">
        <div class="col-md-6">
          <h2>All the features you want in a professional email service.</h2>
          <ul class="list" style="line-height: 25px;">
              <li> - ActiveSync Push Mail</li>
              <li> - 24/7 Webmail Access</li>
              <li> - Outlook Autoconfig</li>
              <li> - IMAP/POP Enabled</li>
              <li> - Up to 20GB per Mailbox</li>
              <li> - Highly Secure</li>
          </ul>
          <br />
          <?php
                Modal::begin([
                'header' => '<div style="color: black;"><h2>Account Sign Up</h2></div>',
                'size' => 'SIZE_SMALL',
                'toggleButton' => ['label' => 'Sign Up Now', 'class' => 'btn btn-lg btn-success'],
                ]);
                $model = new app\models\AccountSignupTransaction();
                echo $this->render("@app/views/transaction/_form",['model' => $model]);
                

                Modal::end();
            ?>
          <br /><span style="font-size: 48px;">
              <i class="ion-social-apple"></i>
              <i class="ion-social-tux"></i>
              <i class="ion-social-windows"></i>
              <i class="ion-social-android"></i>
          </span>
        </div>
        <div class="col-md-6">
            <img src="<?= Yii::getAlias('@web'); ?>/img/mail-all-retina.png" class="img-responsive mt" alt="">
        </div>
      </div><!--/row-->
    </div><!--/container-->

    
        <div id="green">
      <div class="container">
        <div class="row centered">
            <h1>Enjoy 3 months FREE when you sign up today</h1>
            <h3>This offer is of limited time only</h3>
            <i style="font-size: 1000%;" class="ion-coffee"></i>
          <!--<div class="col-md-6 col-md-offset-3 centered">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              
              <div class="carousel-inner">
                <div class="item active">
                  <h3>I enjoyed so much the last edition of Landing Sumo, that I bought the tickets for the new one edition of the event the first day.</h3>
                  <h5><tgr>DAVID JHONSON</tgr></h5>
                </div>
                <div class="item">
                  <h3>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
                  <h5><tgr>MARK LAWRENCE</tgr></h5>
                </div>
                <div class="item">
                  <h3>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration, by injected humour.</h3>
                  <h5><tgr>LISA SMITH</tgr></h5>
                </div>
              </div>
            </div>

          </div>-->
        </div>
      </div>
    </div>

    <div class="container ptb">
      <div class="row centered">
        <h2 class="mb">Our Pricing Model<br/>It's Quite Easy To Understand.</h2>
        <div class="col-md-4">
          <div class="price-table">
              <div class="p-head">
                Starter
              </div>
              <div class="p-body">
                <ul class="features">
                  <li>15 Mailboxes</li>
                  <li>10GB Storage/Mailbox</li>
                  <li>Webmail Access</li>
                  <li>24/7 Free Support</li>
                </ul>
                <div class="price">
                  <span class="sub">$</span>
                  <span class="detail">26</span>
                  <span class="sub">/yr/user</span>
                </div><!--/price-->
                          <?php
                Modal::begin([
                'header' => '<div style="color: black;"><h2>Account Sign Up</h2></div>',
                'size' => 'SIZE_SMALL',
                'toggleButton' => ['label' => 'Sign Up Now', 'class' => 'btn btn-conf-2 btn-green'],
                ]);
                $model = new app\models\AccountSignupTransaction(); $model->package_id = app\models\AccountPackage::findOne(['package_slug' => 'starter'])->id;
                echo $this->render("@app/views/transaction/_form",['model' => $model]);
                

                Modal::end();
            ?>
              </div><!--/p-body-->
          </div><!--/price-table-->
        </div><!--/col-md-4-->

         <div class="col-md-4">
          <div class="price-table">
              <div class="p-head">
                Standard
              </div>
              <div class="p-body">
                <ul class="features">
                 <li>25 Mailboxes</li>
                  <li>15GB Storage/Mailbox</li>
                  <li>Webmail Access</li>
                  <li>24/7 Free Support</li>
                </ul>
                <div class="price">
                  <span class="sub">$</span>
                  <span class="detail">25</span>
                  <span class="sub">/yr/user</span>
                </div><!--/price-->
                <?php
                    Modal::begin([
                    'header' => '<div style="color: black;"><h2>Account Sign Up</h2></div>',
                    'size' => 'SIZE_SMALL',
                    'toggleButton' => ['label' => 'Sign Up Now', 'class' => 'btn btn-conf-2 btn-green'],
                    ]);
                    $model = new app\models\AccountSignupTransaction(); $model->package_id = app\models\AccountPackage::findOne(['package_slug' => 'standard'])->id;
                    echo $this->render("@app/views/transaction/_form",['model' => $model]);


                    Modal::end();
                ?>
              </div><!--/p-body-->
          </div><!--/price-table-->
        </div><!--/col-md-4-->

         <div class="col-md-4">
          <div class="price-table">
              <div class="p-head">
                Business
              </div>
              <div class="p-body">
                <ul class="features">
                  <li>50 Mailboxes</li>
                  <li>20GB Storage/Mailbox</li>
                  <li>Webmail Access</li>
                  <li>24/7 Free Support</li>
                </ul>
                <div class="price">
                  <span class="sub">$</span>
                  <span class="detail">24</span>
                  <span class="sub">/yr/user</span>
                </div><!--/price-->
                <?php
                    Modal::begin([
                    'header' => '<div style="color: black;"><h2>Account Sign Up</h2></div>',
                    'size' => 'SIZE_SMALL',
                    'toggleButton' => ['label' => 'Sign Up Now', 'class' => 'btn btn-conf-2 btn-green'],
                    ]);
                    $model = new app\models\AccountSignupTransaction(); $model->package_id = app\models\AccountPackage::findOne(['package_slug' => 'business'])->id;
                    echo $this->render("@app/views/transaction/_form",['model' => $model]);


                    Modal::end();
                ?>
              </div><!--/p-body-->
          </div><!--/price-table-->
        </div><!--/col-md-4-->
        <div class="container">
            
            <h2>Payment Options</h2>
            <img style="width: 40%; height: 40%;" src="img/ways-to-pay-gs.jpg" alt=""/>
        
        </div>
      </div><!--/row-->
    </div><!--/container-->

   <!--/<div id="g">
      <div class="container">
        <div class="row sponsor centered">
          <div class="col-sm-2 col-sm-offset-1">
            <img src="img/client1.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/client3.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/client2.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/client4.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="assets/img/client5.png" alt="">
          </div>
        </div>
      </div>row
    </div>g -->
<div id="sep">
      <div class="container">
        <div class="row centered">
          <div class="col-md-8 col-md-offset-2">
            <h1>We delight our customers with EXCELLENT and QUICK support to keep their business running</h1>
            <h3>24/7 reliable support at no additional cost</h3> <br />
         <span><a class="btn btn-warning btn-lg" href="mailto:info@softcube.co">Contact Us</a></span> </div><!--/col-md-8-->
        </div>
      </div>
    </div><!--/sep-->
    <div id="f">
      <div class="container">
        <div class="row centered">
          <h5><?= Yii::$app->formatter->asEmail('INFO@SOFTCUBE.CO') ?></h5>

          <p class="mt">
            <a href="skype:sirantho20?call"><i class="ion-social-skype"></i></a>
            <a href="https://facebook.com/softcubelimited"><i class="ion-social-twitter"></i></a>
            <a href="https://twitter.com/softcubelimited"><i class="ion-social-facebook"></i></a>
            <a href="https://google.com/+SoftcubeCo"><i class="ion-social-googleplus"></i></a>
            
          </p>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/F-->

<?php $this->endBody() ?>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.softcube.co/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics.softcube.co/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

</body>
</html>
<?php $this->endPage() ?>
