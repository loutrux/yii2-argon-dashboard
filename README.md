# [Yii2 Argon Dashboard - Free Bootstrap Argon Design Admin]


[Theme Documentation](https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html) 

[Creative Tim](https://www.creative-tim.com/product/argon-dashboard)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install Argon Dashboard run:

```sh
php composer.phar require loutrux/yii2-argon-dashboard "@dev"
```

## Or

Add to composer.json

```json
{
	"require": {
		"loutrux/yii2-argon-dashboard": "@dev"
	}
}
```

And run

```sh
php composer.phar update
```

Usage
-----

## Layouts

Layouts are available as sample in :

@vendor/loutrux/yii2-argon-dashboard/layouts

### argon-admin-alt
![alt text](https://raw.githubusercontent.com/loutrux/yii2-argon-dashboard/master/screenshots/argon-admin-alt.png)

### argon-main-alt
![alt text](https://raw.githubusercontent.com/loutrux/yii2-argon-dashboard/master/screenshots/argon-main-alt.png)

![alt text](https://raw.githubusercontent.com/loutrux/yii2-argon-dashboard/master/screenshots/argon-main-alt_scrolled-down.png)

## Widgets

The folowing widgets have been refactored or create to assume compatibility :

```php

use loutrux\argon\widgets\Nav;
use loutrux\argon\widgets\NavBar;
use loutrux\argon\widgets\Dropdown;
use loutrux\argon\widgets\Modal;

//NEW
use loutrux\argon\widgets\Card;
use loutrux\argon\widgets\StatCard;
use loutrux\argon\widgets\Tabs;

```


Version logs
------------
- Version 0.0.1 : Initial commit 
- Version 0.0.2 : Make bootstrap config more simple
- Version 0.0.3 : Improve layouts


License
-------
- Copyright 2019 Creative Tim (http://www.creative-tim.com)
