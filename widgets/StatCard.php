<?php
namespace loutrux\argon\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class StatCard extends Widget{

	
	
	public $options 		= [];
	public $title			= '';	
	public $titleOptions	= [];
	public $content			= '';
	public $contentOptions	= [];
	public $icon			= '';
	public $iconOptions		= [];
	public $footer			= '';
	public $footerOptions	= [];
	public $items	= [];
	public $itemsOptions	= [];
	
	public function init(){
		parent::init();
		if (empty($this->items)){
			$item = [];
			$item['options'] 			= $this->options;
			$item['title'] 				= $this->title;
			$item['titleOptions'] 		= $this->titleOptions;
			$item['content'] 			= $this->content;
			$item['contentOptions'] 	= $this->contentOptions;
			$item['icon'] 				= $this->icon;
			$item['iconOptions'] 		= $this->iconOptions;
			$item['footer'] 			= $this->footer;
			$item['footerOptions'] 		= $this->footerOptions;

			$this->renderItem($item);
		} else {

			if (empty($this->itemsOptions['class'])) {
				Html::addCssClass($this->itemsOptions, ['class' => 'row']);
			};
			$itemsOptions = $this->itemsOptions;
			$itemsTag = ArrayHelper::remove($itemsOptions, 'tag', 'div');

			echo Html::beginTag($itemsTag, $itemsOptions);
			
			foreach ($this->items as $item){

				if (!isset($item['itemOptions'])) 			$item['itemOptions'] = [];
				if (!isset($item['itemOptions']['class']))	$item['itemOptions']['class'] = [];
				if (empty($item['itemOptions']['class'])) {
					Html::addCssClass($item['itemOptions'], ['class' => 'col']);
				};
				$itemOptions = $item['itemOptions'];
				$itemTag = ArrayHelper::remove($itemOptions, 'tag', 'div');

				echo Html::beginTag($itemTag, $itemOptions);
				$this->renderItem($item);
				echo Html::EndTag($itemTag);

			}

			echo Html::EndTag($itemsTag);
		}
		/*
        if (empty($this->options['class'])) {
            Html::addCssClass($this->options, ['class' => 'card card-stats mb-3 mb-xl-0']);
        } else {
            Html::addCssClass($this->options, ['class' => 'card card-stats']);
		};
        $options = $this->options;
		$tag = ArrayHelper::remove($options, 'tag', 'div');

        if (empty($this->titleOptions['class'])) {
            Html::addCssClass($this->titleOptions, ['class' => 'card-title text-uppercase text-muted mb-0']);
        } else {
            Html::addCssClass($this->titleOptions, ['class' => 'card-title']);
		};
		$titleOptions = $this->titleOptions;
		$titleTag = ArrayHelper::remove($titleOptions, 'tag', 'h5');


        if (empty($this->contentOptions['class'])) {
            Html::addCssClass($this->contentOptions, ['class' => 'h2 font-weight-bold mb-0']);
        };
        $contentOptions = $this->contentOptions;
		$contentTag = ArrayHelper::remove($contentOptions, 'tag', 'span');


        if (empty($this->iconOptions['class'])) {
            Html::addCssClass($this->iconOptions, ['class' => 'icon icon-shape rounded-circle shadow']);
        } else {
            Html::addCssClass($this->iconOptions, ['class' => 'icon icon-shape rounded-circle']);
		};
		$iconOptions = $this->iconOptions;
		$iconTag = ArrayHelper::remove($iconOptions, 'tag', 'div');

        if (empty($this->footerOptions['class'])) {
            Html::addCssClass($this->footerOptions, ['class' => 'mt-3 mb-0 text-muted text-sm']);
		};
		
		$footerOptions = $this->footerOptions;
		$footerTag = ArrayHelper::remove($footerOptions, 'tag', 'p');


		echo Html::beginTag($tag, $options);
		echo Html::beginTag('div',['class' => 'card-body']);
		echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col']);
		echo Html::tag($titleTag,$this->title,$titleOptions);
		echo Html::tag($contentTag,$this->content,$contentOptions);
		echo Html::EndTag('div');
		echo Html::beginTag('div',['class' => 'col-auto']);
		echo Html::tag($iconTag,$this->icon,$iconOptions);
		echo Html::EndTag('div');
		echo Html::EndTag('div');
		echo Html::tag($footerTag,$this->footer,$footerOptions);
        echo Html::EndTag('div');
        echo Html::EndTag($tag);
		*/
	}

	public function renderItem($item){


        if (!isset($item['options'])) 			$item['options'] = [];
        if (!isset($item['options']['class']))	$item['options']['class'] = [];
        if (empty($item['options']['class'])) {
            Html::addCssClass($item['options'], ['class' => 'card card-stats mb-3 mb-xl-0']);
        } else {

            Html::addCssClass($item['options'], ['class' => 'card card-stats']);
		};
        $options = $item['options'];
		$tag = ArrayHelper::remove($options, 'tag', 'div');


        if (!isset($item['titleOptions'])) 			$item['titleOptions'] = [];
        if (!isset($item['titleOptions']['class']))	$item['titleOptions']['class'] = [];
        if (empty($item['titleOptions']['class'])) {
            Html::addCssClass($item['titleOptions'], ['class' => 'card-title text-uppercase text-muted mb-0']);
        } else {
            Html::addCssClass($item['titleOptions'], ['class' => 'card-title']);
		};
		$titleOptions = $item['titleOptions'];
		$titleTag = ArrayHelper::remove($titleOptions, 'tag', 'h5');


        if (!isset($item['contentOptions'])) 			$item['contentOptions'] = [];
        if (!isset($item['contentOptions']['class']))	$item['contentOptions']['class'] = [];
        if (empty($item['contentOptions']['class'])) {
            Html::addCssClass($item['contentOptions'], ['class' => 'h2 font-weight-bold mb-0']);
        };
        $contentOptions = $item['contentOptions'];
		$contentTag = ArrayHelper::remove($contentOptions, 'tag', 'span');


        if (!isset($item['iconOptions'])) 			$item['iconOptions'] = [];
        if (!isset($item['iconOptions']['class']))	$item['iconOptions']['class'] = [];
        if (empty($item['iconOptions']['class'])) {
            Html::addCssClass($item['iconOptions'], ['class' => 'icon icon-shape rounded-circle shadow']);
        } else {
            Html::addCssClass($item['iconOptions'], ['class' => 'icon icon-shape rounded-circle']);
		};
		$iconOptions = $item['iconOptions'];
		$iconTag = ArrayHelper::remove($iconOptions, 'tag', 'div');

        if (!isset($item['footerOptions'])) 			$item['footerOptions'] = [];
        if (!isset($item['footerOptions']['class'])) 	$item['footerOptions']['class'] = [];
        if (empty($item['footerOptions']['class'])) {
            Html::addCssClass($item['footerOptions'], ['class' => 'mt-3 mb-0 text-muted text-sm']);
		};
		
		$footerOptions = $item['footerOptions'];
		$footerTag = ArrayHelper::remove($footerOptions, 'tag', 'p');


		echo Html::beginTag($tag, $options);
		echo Html::beginTag('div',['class' => 'card-body']);
		echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col']);
		echo Html::tag($titleTag,$item['title'],$titleOptions);
		echo Html::tag($contentTag,$item['content'],$contentOptions);
		echo Html::EndTag('div');
		echo Html::beginTag('div',['class' => 'col-auto']);
		echo Html::tag($iconTag,$item['icon'],$iconOptions);
		echo Html::EndTag('div');
		echo Html::EndTag('div');
		echo Html::tag($footerTag,$item['footer'],$footerOptions);
        echo Html::EndTag('div');
        echo Html::EndTag($tag);
	}
	
	public function run(){
/*
		<div class="card card-stats mb-3 mb-xl-0">
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
			  */
	}
}