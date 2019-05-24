<?php
namespace loutrux\argon\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Card extends Widget{

	public $options 		= [];
	public $tag				= '';
	public $header			= '';	
	public $headerOptions	= [];
	public $headerTitle		= '';
	public $headerImg		= '';
	public $headerImgUrl	= '#';
	public $headerItems		= [];
	public $body			= '';
	public $bodyTag			= '';
	public $bodyOptions		= [];
	public $bodyTitle		= '';
	public $bodySubTitle = '';
	public $bodyText 		= '';
	public $footer			= '';
	public $footerOptions	= [];
	
	public function init(){
		parent::init();

        Html::addCssClass($this->options, ['class' => 'card shadow'.(($this->headerImg)?' card-profile':'')]);
		$this->tag = ArrayHelper::remove($this->options, 'tag', 'div');

        Html::addCssClass($this->headerOptions, ['class' => 'card-header bg-transparent']);
		$headerTag = ArrayHelper::remove($this->headerOptions, 'tag', 'div');

		Html::addCssClass($this->bodyOptions, ['class' => 'card-body']);
		$this->bodyTag = ArrayHelper::remove($this->bodyOptions, 'tag', 'div');
		
		echo Html::beginTag($this->tag, $this->options);

		//If header is null, Card widget use headerItems and headerTitle to make the header
		$headerItems = '';
		if (is_array($this->headerItems))
			foreach($this->headerItems as $item)
				if (is_array($item))
					$headerItems .= Html::a(
						Arrayhelper::getValue($item,'label'),
						Arrayhelper::getValue($item,'url'),
						Arrayhelper::getValue($item,'linkOptions',['class' => 'btn btn-sm btn-primary']));
				else $headerItems .= $item;

		// For Image display header is different
		if ($this->headerImg !== ''){
			// Display image before header
			echo Html::tag('div',
					Html::tag('div',
						Html::tag('div',
							Html::a(Html::img($this->headerImg,['class' => 'rounded-circle','style' => 'max-width: 90px !important;']),$this->headerImgUrl)
						,['class' => 'card-profile-image'])
					,['class' => 'col-lg-3 order-lg-2'])
				,['class' => 'row justify-content-center']);
				
			// Prepare links displaying
			if ($this->header === '')
				$this->header = Html::tag('div',$headerItems);
		} else 
		// Header without image
		if (($this->header === '') && (($this->headerTitle !== '') || ($headerItems !== '')))
			$this->header = 
				Html::tag('div',
					Html::tag('div',Html::tag('h3',$this->headerTitle,['class' => "mb-0"]),['class' => 'col-6']).
					Html::tag('div',$headerItems,['class' => 'col-6 text-right'])
				,['class' => 'row align-items-center']);

		if ($this->header !== ''){
			// Multiple headers can be define in an array
			if (!is_array($this->header))
				echo Html::tag($headerTag, $this->header, $this->headerOptions);
			else {
				
				echo Html::beginTag($headerTag, $this->headerOptions);
				echo Html::beginTag('div', ['class' => 'row align-items-center']);
				foreach ($this->header as $head)
					echo Html::tag('div',$head,['class' => 'col']);
				echo Html::EndTag('div');
				echo Html::EndTag($headerTag);

			}
		}
		if ($this->body !== false)
		echo Html::beginTag($this->bodyTag, $this->bodyOptions);

		if (($this->bodyTitle !== '') || ($this->bodySubTitle !== '')){
			echo Html::beginTag('h5',['class' => 'h3 title']);
			if ($this->bodyTitle !== '')
				echo Html::tag('span',$this->bodyTitle,['class' => 'd-block mb-1']);
			if ($this->bodySubTitle !== '')
				echo Html::tag('small',$this->bodySubTitle,['class' => 'h4 font-weight-light text-muted']);
			echo Html::endTag('h5');
			}


			if ($this->bodyText !== '')
				echo Html::tag('p',$this->bodyText,['class' => 'card-text mb-4']);
			/*

		if (($this->bodyTitle !== '') || ($this->bodyDescription !== '')){
			if ($this->bodyTitle !== '')
				echo Html::tag('h3',$this->bodyTitle,['class' => 'card-title mb-3']);
			if ($this->bodyDescription !== '')
				echo Html::tag('p',$this->bodyDescription,['class' => 'card-text mb-4']);
			}
			*/
		echo $this->body;

	}

	public function run(){

		//if ($this->bodyTag && $this->body)
		if ($this->body !== false)
		echo Html::EndTag($this->bodyTag);

		if ($this->footer){
			Html::addCssClass($this->footerOptions, ['class' => 'card-footer bg-transparent']);
			$footerTag = ArrayHelper::remove($this->footerOptions, 'tag', 'div');
			echo Html::tag($footerTag,$this->footer,$this->footerOptions);
		}
        echo Html::EndTag($this->tag);

	}
}