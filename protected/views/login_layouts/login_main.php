<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="wrap" class="blangradient">
	<div class="landing bluerer">
		<div class="row">
			<a href="index.php">
				<div class="large-6 columns mainlogo">
					<h1>TimeCaT</h1><p>Time Capture Tool</p>
				</div>
			</a>
			<div class="large-3 columns hide-for-small">
			</div>
			<div class="large-3 columns hide-for-small text-right signupbut">
				<?php echo CHtml::link(UserModule::t("Sign up here"), Yii::app()->getModule('user')->registrationUrl, array('class' => 'button success radius')); ?>			
			</div>
		</div>
	</div>
	<div id="main">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>

