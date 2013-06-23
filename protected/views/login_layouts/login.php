<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//login_layouts/login_nav'); ?>
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
		<div class="row">
			<div class="large-6 columns">
				<p><?php echo CHtml::link(UserModule::t("Don't have an account?"), Yii::app()->getModule('user')->registrationUrl); ?></p>
			</div>
			<div class="large-6 columns text-right">
				<p><?php echo CHtml::link(UserModule::t("Forgot your password?"), Yii::app()->getModule('user')->recoveryUrl);  ?></p>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>