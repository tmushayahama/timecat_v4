<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/tc_main'); ?>
<div id="wrap" class="blangradient">
	<div id="cabecera" class="bluerer">
		<div id="avatarer" class="left">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/'. $this->Avatar(), "avatar"); ?>
		</div>
		<div id="titler" class="left">
			<p class="eliseo"><strong><?php echo $this->study_name; ?></strong><br/>
				<span class="utitler"><?php echo $this->fullName(); ?> - <em><?php echo $this->study_role ?></em></span></p>
		</div>
		<div id="quiter" class="right">
			<?php echo CHtml::link('<span class="hide-for-small">Close Study</span><span class="show-for-small"><i class="foundicon-right-arrow "></i></span>', Yii::app()->getModule('user')->returnUrl, array('class' => 'button secondary close-study small')); ?>
		</div>		
	</div>
	<div id="main">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent() ?>