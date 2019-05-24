<?php
namespace loutrux\argon;

use yii\base\Exception;
use yii\web\AssetBundle;

/**
 * Material AssetBundle
 * @since 0.1
 */
class ArgonAsset extends AssetBundle
{
    public $sourcePath = '@vendor/loutrux/yii2-argon-dashboard';

    public $css = [
        //'template/assets/css/argon.min.css',
        'template/assets/scss.1/test.css',
        'template/assets/vendor/nucleo/css/nucleo.css',
        'assets/navbar/navbar.css',
        //'assets/fullcalendar/fullcalendar.css',
        //'template/assets/vendor/bootstrap/dist/css/bootstrap.min.css',
    ];

    public $js = [
        'template/assets/js/argon.min.js',
        'assets/navbar/navbar.js',
        'assets/navbar/sticky-rubric.js',
        //'assets/fullcalendar/fullcalendar.min.js',
        //'template/assets/vendor/bootstrap/dist/js/bootstrap.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
