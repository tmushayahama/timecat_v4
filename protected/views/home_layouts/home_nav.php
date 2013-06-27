<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/tc_main'); ?>
<div id="wrap" class="blangradient">
	<div id="cabecera" class="bluerer">
		<div id="avatarer" class="left">
			<?php echo CHtml::link('<img src="img/gatologo2.png" alt="avatar" />', Yii::app()->getModule('user')->returnUrl); ?>			
		</div>
		<div id="titler" class="left">
			<p class="eliseo"><strong>TimeCaT 4.0</strong><br/>
				<span class="utitler">Dashboard</span></p>
		</div>
		<div id="quiter" class="right">
			<?php echo CHtml::link('<span class="hide-for-small">Log out</span><span class="show-for-small"><i class="foundicon-right-arrow "></i></span>', Yii::app()->getModule('user')->logoutUrl, array('class' => 'button logout alert small')) ?>

		</div>		
	</div>
	<div id="main">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent() ?>