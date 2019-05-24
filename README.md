# [Yii2 Argon Dashboard - Free Bootstrap Argon Design Admin]

## PACKAGE IN ALPHA MODE MANY WORK MUST BE MADE !!!


[Theme Documentation](https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html) 

[Creative Tim](https://www.creative-tim.com/product/argon-dashboard)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install Argon Dashboard run:

```sh
php composer.phar require loutrux/yii2-Argon-dashboard "@dev"
```

## Or

Add to composer.json

```json
{
	"require": {
		"loutrux/yii2-Argon-dashboard": "@dev"
	}
}
```

And run

```sh
php composer.phar update
```

Usage
-----
in your @app/config/main.php include the folliwin code

```php

        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '@vendor/loutrux/yii2-argon-dashboard/template/assets/vendor/bootstrap/dist',  
                    'css' => [
                        'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => '@vendor/loutrux/yii2-argon-dashboard/template/assets/vendor/bootstrap/dist',  
                    'js' => [
                        'js/bootstrap.bundle.min.js',
                    ]
                ],
            ]
        ],
```


Layouts are available as sample in :

@vendor/loutrux/yii2-argon-dashboard/layouts

The folowing widgets have been refactored or create to assume compatibility :

```php

use loutrux\argon\widgets\Nav;
use loutrux\argon\widgets\NavBar;
use loutrux\argon\widgets\Dropdown;
use loutrux\argon\widgets\Modal;

use loutrux\argon\widgets\Card;
use loutrux\argon\widgets\StatCard;
use loutrux\argon\widgets\Nav;
use loutrux\argon\widgets\Nav;


```


Version logs
------------



License
-------
- Copyright 2019 Creative Tim (http://www.creative-tim.com)
