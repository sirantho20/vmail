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
          <a href="#" class="btn btn-lg btn-success">Sign Up Now</a>
        </div>
        <div class="col-md-6">
          <img src="img/iphone-6-plus-4-landscape.jpg" class="img-responsive mt" alt="">
        </div>
      </div><!--/row-->
    </div><!--/container-->

    <div id="sep">
      <div class="container">
        <div class="row centered">
          <div class="col-md-8 col-md-offset-2">
            <h1>We delight our customers with EXCELLENT and QUICK support to keep their business running</h1>
            <h4>24/7 reliable support at no additional cost</h4>
          </div><!--/col-md-8-->
        </div>
      </div>
    </div><!--/sep-->

    <div class="container ptb">
      <div class="row centered">
        <h2 class="mb">Our Pricing Model<br/>It's Quite Easy To Understand.</h2>
        <div class="col-md-4">
          <div class="price-table">
              <div class="p-head">
                Standard
              </div>
              <div class="p-body">
                <ul class="features">
                  <li>10GB Storage Space</li>
                  <li>Free Support</li>
                  <li>100 Users</li>
                  <li>100GB Bandwith</li>
                </ul>
                <div class="price">
                  <span class="sub">$</span>
                  <span class="detail">29</span>
                  <span class="sub">/mo.</span>
                </div><!--/price-->
                <button class="btn btn-conf-2 btn-green">Subscribe Now</button>
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
                  <li>50GB Storage Space</li>
                  <li>Free Support</li>
                  <li>500 Users</li>
                  <li>500GB Bandwith</li>
                </ul>
                <div class="price">
                  <span class="sub">$</span>
                  <span class="detail">49</span>
                  <span class="sub">/mo.</span>
                </div><!--/price-->
                <button class="btn btn-conf-2 btn-green">Subscribe Now</button>
              </div><!--/p-body-->
          </div><!--/price-table-->
        </div><!--/col-md-4-->

         <div class="col-md-4">
          <div class="price-table">
              <div class="p-head">
                Corporate
              </div>
              <div class="p-body">
                <ul class="features">
                  <li>100GB Storage Space</li>
                  <li>Free Support</li>
                  <li>10,000 Users</li>
                  <li>3TB Bandwith</li>
                </ul>
                <div class="price">
                  <span class="sub">$</span>
                  <span class="detail">89</span>
                  <span class="sub">/mo.</span>
                </div><!--/price-->
                <button class="btn btn-conf-2 btn-green">Subscribe Now</button>
              </div><!--/p-body-->
          </div><!--/price-table-->
        </div><!--/col-md-4-->
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

    <!--/<div id="green">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 centered">
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

          </div>
        </div>
      </div>
    </div>-->

    <div id="f">
      <div class="container">
        <div class="row centered">
          <h2>You Can Contact Us</h2>
          <h5><?= Yii::$app->formatter->asEmail('INFO@SOFTCUBE.CO') ?></h5>

          <p class="mt">
            <a href="https://facebook.com/softcubelimited"><i class="ion-social-twitter"></i></a>
            <a href="https://twitter.com/softcubelimited"><i class="ion-social-facebook"></i></a>
          </p>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/F-->

<?php $this->endBody() ?>
        <!-- Custom Theme JavaScript -->
   
</body>
</html>
<?php $this->endPage() ?>
