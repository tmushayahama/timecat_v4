<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/tc_main'); ?>
<div id="wrap" class="blangradient">
	<nav class="top-bar bluerer">
		<ul class="title-area">
			<li id="gato" class="name">
				<h1>
					<?php echo CHtml::link('TimeCaT <small><em>4.0</em></small>', Yii::app()->getModule('user')->returnUrl); ?>			
				</h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<li class="divider"></li>
				<li>
					<?php echo CHtml::link('Studies', Yii::app()->getModule('user')->returnUrl, array('class' => 'bluerer')); ?>
				</li>
				<li class="divider"></li>
				<li><a class="bluerer" href="#">TCNet</a></li>
				<li class="divider"></li>
				<li>
					<?php echo CHtml::link('Profile', Yii::app()->getModule('user')->profileUrl, array('class' => 'bluerer')) ?>
				</li>
				<li class="divider"></li>
				<li class="has-form bluerer">
					<?php echo CHtml::link('Log Out', Yii::app()->getModule('user')->logoutUrl, array('class' => 'button alert')) ?>
			</ul>
		</section>
	</nav>
	<div id="main">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent() ?>