<?php
namespace loutrux\argon\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class CardStats extends Widget{

	public $options 		= [];
	public $items			= [];
	
	public function init(){
		parent::init();

        Html::addCssClass($this->options, ['class' => 'card-profile-stats d-flex justify-content-center p-0', 'style' => 'flex-flow: row wrap;']);

		$body = '';
		if (is_array($this->items))
			foreach($this->items as $item)
				if (($content = ArrayHelper::getValue($item,'content')) !== null)
					$body .= $content;
				else
					$body .= Html::tag('div',
								Html::a(
								Html::tag('span',ArrayHelper::getValue($item,'heading'),['class' => 'heading']).
								Html::tag('span',ArrayHelper::getValue($item,'description'),['class' => 'description']),
								ArrayHelper::getValue($item,'url'),
								ArrayHelper::getValue($item,'linkOptions',[]),
								),
								['style' => 'padding: 0;']
							);

		echo Html::tag('div',$body, $this->options);

	}

	public function run(){

	}
}