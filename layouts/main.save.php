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
\yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset']['css'] = [];
\loutrux\argon\ArgonAsset::register($this);

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
<body>
<?php $this->beginBody() ?>


    <?php
    // This layout get 2 Navbar : 1 in sideleft 1 on the top of the main container 
    // In this example, in mobile view the second Navbar is hidden and the sideleft menu collapse exept the brandLabel and headerContent


    $itemsUser =  [
        ['label' => '<i class="ni ni-tv-2 text-green"></i> Notification', 'url' => ['/site/about']],
        [
        'label' => 'username',
       // 'options' => ['class' => 'nav-item'],
       // 'linkOptions' => ['class' => 'nav-link'],
        'dropDownOptions' => ['class' => 'dropdown-menu-right'],
        'items' => [
                ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                '<hr class="my-3">',
                '<li class="dropdown-header text-gray">Dropdown Header</li>',
                ['label' => 'Level 1 - Dropdown B', 'url' => '#']
            ]
        ]
    ];

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white',
        ],
        // (optional) uncollapsed menu showed in mobile view
        'headerContent' => Nav::widget([
                                'options' => ['class' => 'd-md-none align-items-center'],
                                'encodeLabels' => false,
                                'items' => $itemsUser,
                            ]),
    ]);
    $menuItems = [
        ['label' => '<i class="ni ni-tv-2 text-primary"></i> Home', 'url' => ['/site/index'],],
        ['label' => '<i class="ni ni-zoom-split-in text-green"></i> About', 'url' => ['/site/about']],
        ['label' => '<i class="ni ni-user-run text-green"></i> Contact', 'url' => ['/site/contact']],
        '<hr class="my-3">',
        '<li class="dropdown-header text-gray">Dropdown Header</li>',
        [
            'label' => 'Dropdown',
            'options' => [],
            'linkOptions' => [],
            'items' => [
                 ['label' => 'Level 1 - Dropdown A', 'url' => '#','linkOptions' => []],
                 //'<li class="divider"></li>',
                 '<hr class="my-3">',
                 '<li class="dropdown-header text-gray">Dropdown Header</li>',
                 ['label' => 'Level 1 - Dropdown B', 'url' => '#','linkOptions' => []],
            ],
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
   echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="main-content">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-top navbar-expand-md navbar-dark d-none d-md-block',
        ],
        'containerOptions' => [
            'class' => 'flex-row-reverse',
        ]
    ]);

    $menuItems = array_merge([
        '<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
          </div>
        </div>
      </form>',],
      $itemsUser);


    if (Yii::$app->user->isGuest) {
        
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav align-items-center d-md-flex'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>



        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">

                <!--?= Breadcrumbs::widget([
                'itemTemplate' => "<li>{link} <i class=\"ni ni-button-play\"></i> </li>\n",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?-->
    
            <?= Alert::widget() ?>

                <?= \loutrux\argon\widgets\Card::widget([
                    'title'             => 'Example',
                    'content'           => 'Datas 123',
                    'contentOptions'    => ['tag' => 'h3', 'class' => 'text-primary'],
                    'icon'              => '<i class="ni ni-user-run"></i>',
                    'iconOptions'       => ['class' => 'bg-danger'],
                    'footer'            => '<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span class="text-nowrap">Since last month</span>',

                    //'itemsOptions' => [],
                    'items' => [
                        [
                            'itemOptions'       => ['class' => 'col-xl-3 col-lg-6' ],
                            'title'             => 'Example1',
                            'content'           => 'Datas 123',
                            'contentOptions'    => ['tag' => 'h3', 'class' => 'text-primary'],
                            'icon'              => '<i class="ni ni-user-run"></i>',
                            'iconOptions'       => ['class' => 'bg-danger'],
                            'footer'            => '<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span>',
        
                        ],
                        [
                            'itemOptions'       => ['class' => 'col-xl-3 col-lg-6' ],
                            'title'             => 'Example2',
                            'content'           => 'Datas 123',
                            'contentOptions'    => ['tag' => 'h3', 'class' => 'text-primary'],
                            'icon'              => '<i class="ni ni-user-run"></i>',
                            'iconOptions'       => ['class' => 'bg-danger'],
                            'footer'            => '<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span>',
        
                        ],
                        [
                            'itemOptions'       => ['class' => 'col-xl-6 col-lg-12' ],
                            'title'             => 'Example3',
                            'content'           => 'Datas 123',
                            'contentOptions'    => ['tag' => 'h3', 'class' => 'text-primary'],
                            'icon'              => '<i class="ni ni-user-run"></i>',
                            'iconOptions'       => ['class' => 'bg-danger'],
                            'footer'            => '<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last month</span>',
        
                        ]
                    ]
                ]);  ?>    

            <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>










                </div>
            </div>
        </div>
        


        <div class="container-fluid mt--7">
        <div class="row">

        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class="text-white mb-0">Sales value</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas chartjs-render-monitor" width="1172" height="700" style="display: block; height: 350px; width: 586px;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Total orders</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="chart-orders" class="chart-canvas chartjs-render-monitor" width="506" height="700" style="display: block; height: 350px; width: 253px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>


        <?= $content ?>


        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                    &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                    </div>
                </div>
                <div class="col-xl-6">
                <?= Nav::widget([
                            'options' => ['class' => 'nav nav-footer justify-content-center justify-content-xl-end'],
                            'encodeLabels' => false,
                            'items' => [
                                [
                                    'label' => 'Dropdown',
                                    'options' => ['class' => 'nav-item'],
                                    'linkOptions' => ['class' => 'nav-link'],
                                    'items' => [
                                         ['label' => 'Level 1 - Dropdown A', 'url' => '#','linkOptions' => ['class' => 'nav-link']],
                                         //'<li class="divider"></li>',
                                         '<hr class="my-3">',
                                         '<li class="dropdown-header text-gray">Dropdown Header</li>',
                                         ['label' => 'Level 1 - Dropdown B', 'url' => '#','linkOptions' => ['class' => 'nav-link']],
                                    ],
                                ], 
                                ['label' => '<i class="ni ni-tv-2 text-green"></i> Notification', 'url' => ['/site/about']],
                                
                                ['label' => '<i class="ni ni-tv-2 text-green"></i> Autre chose', 'url' => ['/site/about']], 
                               
                            ],
                        ]);
                    ?>
                </div>
                </div>
        </footer>
    
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
