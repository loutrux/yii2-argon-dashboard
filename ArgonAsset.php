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
        'template/assets/vendor/nucleo/css/nucleo.css',
        'template/assets/vendor/glyphicons/css/glyphicons.css',
        'assets/navbar/navbar.css'        
    ];

    public $js = [
        'template/assets/js/argon.min.js',
        'template/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
        'assets/navbar/navbar.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];


    /**
     * @inheritdoc
     */
    public function init()
    {
        if ((class_exists('\common\models\Appearence')))
            $this->css[] = \common\models\Appearence::getCss();
        else 
            $this->css[] = 'template/assets/css/argon.css';

        $this->css[] = 'assets/css/override.css';
        parent::init();
    }
}
