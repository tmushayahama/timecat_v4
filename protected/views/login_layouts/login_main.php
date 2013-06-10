<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/tc_main'); ?>
<div id="wrap" class="blangradient">
	<div class="landing bluerer">
		<div class="row">
			<a href="login">
				<div class="large-6 columns mainlogo">
					<h1>TimeCaT</h1><p>Time Capture Tool</p>
				</div>
			</a>
			<div class="large-3 columns hide-for-small">
			</div>
			<div class="large-3 columns hide-for-small text-right signupbut">
				<?php if ($this->is_registration): ?>
					<?php echo CHtml::link(UserModule::t("Login"), Yii::app()->getModule('user')->loginUrl, array('class' => 'button secondary radius entrar')); ?>			
				<?php else: ?>
					<?php echo CHtml::link(UserModule::t("Sign up here"), Yii::app()->getModule('user')->registrationUrl, array('class' => 'button success radius')); ?>			
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div id="main">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>

