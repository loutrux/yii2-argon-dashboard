<?php
namespace loutrux\argon\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

class Tabs extends Widget{

	public $items			= [];
	public $linkOptions		= [];
	public $navOptions		= [];
	public $bodyOptions		= null;
	public $loadingContent = '<i class="fas fa-sync fa-spin fa-fw"></i>';
	public $position	= 'above';
	public $pills		= 'default';

	const POS_ABOVE 	= 'above';
	const POS_BELOW 	= 'below';
	const POS_LEFT 		= 'left';
	const POS_RIGHT 	= 'right';

	public function init(){
		parent::init();
		$id = \Yii::$app->security->generateRandomString(5);
		
        //Html::addCssClass($this->options, ['class' => 'card-profile-stats d-flex justify-content-center', 'style' => 'flex-flow: row wrap;']);
		switch ($this->position){
			case self::POS_ABOVE :
				$navClass 			= 'py-2 bg-transparent';
				$contentItemsClass 	= 'bg-gradient-secondary-dark_ no-border';
				$navUlClass 		= 'flex-md-row';
				$navLiClass 		= '';
				break;
			case self::POS_LEFT :
				$navClass 			= 'col-md-auto p-0';
				$contentItemsClass 	= 'col-md p-0';
				$navUlClass 		= 'col row pr-0';
				$navLiClass 		= 'col pl-3 pr-0 mb-1';
				break;
		}

		$navClass .= ' '.ArrayHelper::getValue($this->navOptions,'class');

		//Active tab determination
		$active = false;
		if (is_array($this->items))
			foreach($this->items as $index => $item)
				if (ArrayHelper::getValue($item,'active') == true) {$active = true; break;}
		if (!$active)
			ArrayHelper::setValue($this->items,'0.active',true);

		if ($this->position == self::POS_LEFT)
			echo Html::beginTag('div',['class' => 'row m-0']);

		//Links rendering
		if (is_array($this->items))
		{
			echo Html::beginTag('div',['class' => ' '.$navClass]);
			if ($this->position == self::POS_LEFT)
				echo Html::beginTag('div',['class' => 'row m-0']);
			echo Html::beginTag('ul',['id'=> 'tab-icon-'.$id, 'class' => 'nav nav-pills '.(($this->pills !== 'circle')?'nav-fill':'nav-pills-circle justify-content-center').' flex-column flex-md-row_ '.$navUlClass, 'role' => 'tablist']);

			//echo Html::beginTag('ul',['id'=> 'tab-icon-'.$id, 'class' => 'nav nav-pills nav-fill flex-column flex-md-row_ '.$navUlClass, 'role' => 'tablist']);
			
			foreach($this->items as $index => $item)
			{
				$active = (ArrayHelper::getValue($item,'active') == true)?'active':'';
				echo Html::beginTag('li',['class' => 'nav-item '.$navLiClass]);
					if (($route = ArrayHelper::getValue($item,'linkOptions.data-url'))  !== null)
						{
						echo Html::a(
							ArrayHelper::getValue($item,'label'),
							'#tabs-icons-text-'.$id.$index,
							[ 
								'id' 			=> 'tabs-icons-text-tab-'.$id.$index, 
								'class' 		=> 'nav-link mb-0 px-0 '.$active.' '.ArrayHelper::getValue($this->linkOptions,'class'), 
								'data-toggle' 	=> 'tab', 
								'role' 			=> 'tab', 
								'aria-controls' => 'tabs-icons-text-'.$id.$index, 
								'aria-selected' => true,
								'onclick'		=> '$("#'.'tabs-icons-link-pjax'.$id.$index.'").click();',	
							]);
						}
					else 
						echo Html::a(ArrayHelper::getValue($item,'label'),'#tabs-icons-text-'.$id.$index,[ 'id' => 'tabs-icons-text-tab-'.$id.$index, 'class' => 'nav-link mb-0 px-0 '.$active.' '.ArrayHelper::getValue($this->linkOptions,'class'), 'data-toggle' => 'tab', 'role' => 'tab', 'aria-controls' => 'tabs-icons-text-'.$id.$index, 'aria-selected' => true]);
				echo Html::endTag('li');
			}
			echo Html::endTag('ul');
			if ($this->position == self::POS_LEFT)
				echo Html::endTag('div');
			echo Html::endTag('div');
		}
		Html::addCssClass($this->bodyOptions, ['class' => 'card-body']); 
		//Content tab rendering
		if (is_array($this->items))
		{
			echo Html::beginTag('div',['class' => 'bg-transparent card '.$contentItemsClass]);
			echo Html::beginTag('div',$this->bodyOptions);
			echo Html::beginTag('div',['class' => 'bg-transparent tab-content', 'id' => 'tab-content-'.$id]);

			foreach($this->items as $index => $item)
			{	
				$active = (ArrayHelper::getValue($item,'active') == true)?'show active':'';
				if (ArrayHelper::getValue($item,'active') && ArrayHelper::getValue($item,'linkOptions.data-url')){
					$linkId = 'tabs-icons-link-pjax'.$id.$index;
					$pjaxId = 'tabs-icons-text-pjax'.$id.$index;
					$script = <<< JS
					$(document).ready(function() {
						$("#$pjaxId").on('pjax:error', function (event) {
							event.preventDefault();
							if ($("#$linkId").attr('data-pjaxload-count') == undefined) 
								$("#$linkId").attr('data-pjaxload-count',12);

							$("#$linkId").attr(
								'data-pjaxload-count',
								$("#$linkId").attr('data-pjaxload-count') - 1
							);
							
							if ($("#$linkId").attr('data-pjaxload-count') > 0)
								$("#$linkId").click();
							else if ($("#$linkId").attr('data-pjaxload-count') <= 0)
								$("#$pjaxId").html("loading error");
						});
		
						$("#$linkId").click();
					});
					JS;
					\Yii::$app->view->registerJs($script);
				}
				echo Html::beginTag('div',[ 'id' => 'tabs-icons-text-'.$id.$index, 'class' => 'bg-transparent tab-pane fade '.$active, 'role' => 'tabpanel', 'aria-labelledby' => 'tabs-icons-text-tab'.$id.$index]);
				if (($route = ArrayHelper::getValue($item,'linkOptions.data-url'))  !== null)
					{
						Pjax::begin([
							'id'                    => 'tabs-icons-text-pjax'.$id.$index, 
							'options'				=> ['class' => 'bg-transparent'],
							'enablePushState'       => false, 
							'enableReplaceState'    => false, 
							'timeout'               => 0, 
							'linkSelector'          => '#tabs-icons-link-pjax'.$id.$index]);
							echo Html::a($this->loadingContent,$route,['id'=>'tabs-icons-link-pjax'.$id.$index]);
						Pjax::end();
					}
				else 
					echo ArrayHelper::getValue($item,'content');
				echo Html::endTag('div');
			}

			echo Html::endTag('div');
			echo Html::endTag('div');
			echo Html::endTag('div');
		}
		if ($this->position == self::POS_LEFT)
			echo Html::endTag('div');
	}
}