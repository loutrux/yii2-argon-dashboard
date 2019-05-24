<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use loutrux\argon\widgets\Nav;
use loutrux\argon\widgets\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

//AppAsset::register($this);
//\yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset']['css'] = [];
\yii\helpers\ArrayHelper::setValue(\yii::$app->assetManager->bundles,['yii\bootstrap\BootstrapAsset','css'] , []);
\loutrux\argon\ArgonAsset::register($this);

//rmrevin\yii\fontawesome\CdnProAssetBundle::register($this);
rmrevin\yii\fontawesome\CdnFreeAssetBundle::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="bg-default">
<?php $this->beginBody() ?>

<div class="main-content">
    <!-- Navbar -->
<?php


    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark navbar-fixed-top',
        ],
        'innerContainerOptions' => ['class' => 'container px-4']

    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'encodeLabels' => false,
        'items' => [
            ['label' => '<i class="ni ni-tv-2 text-primary"></i> Home', 'url' => ['/site/index'],],
            ['label' => '<i class="ni ni-zoom-split-in text-green"></i> About', 'url' => ['/site/about']],
            ['label' => '<i class="ni ni-user-run text-green"></i> Contact', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
?>


    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body">
            <?= $this->blocks['header'] ?>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    
    
    <?= $content ?>












  <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            © <?= date('Y') ?> <a href="<?= Yii::$app->homeUrl ?>" class="font-weight-bold ml-1" target="_blank"><?= Yii::$app->name ?></a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Mentions légales</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
