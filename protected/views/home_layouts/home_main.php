<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="wrap" class="blangradient">
	<nav class="top-bar bluerer">
		<ul class="title-area">
			<li id="gato" class="name"><h1><a href="load.php">TimeCaT <small><em>4.0</em></small></a></h1></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<li class="divider"></li>
				<li><a class="bluerer" href="load.php">Studies</a></li>
				<li class="divider"></li>
				<li><a class="bluerer" href="#">TCNet</a></li>
				<li class="divider"></li>
				<li><a class="bluerer" href="profile.php">Profile</a></li>
				<li class="divider"></li>
				<li class="has-form bluerer">
					<?php echo CHtml::link('Log Out', Yii::app()->getModule('user')->logoutUrl, array('class'=>'button alert')) ?>
			</ul>
		</section>
	</nav>
	<div id="main">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent() ?>