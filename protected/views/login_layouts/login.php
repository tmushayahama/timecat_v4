<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//login_layouts/login_main'); ?>
<!--This will be inside div id main <div id="main"> -->
<div class="row">
	<div class="large-8 large-centered columns blanko elogin">
		<div class="row bluerer masabajo">
			<div class="large-12 columns">
				<h3>Log in:</h3>
			</div>
		</div>
		<?php echo $content; ?>
	</div>
</div> 
<div class="row">
	<div class="large-8 large-centered columns">
		<?php echo CHtml::link(UserModule::t("Don't have an account? Sign up here!"), Yii::app()->getModule('user')->registrationUrl); ?>
	</div>
</div>
<?php $this->endContent(); ?>