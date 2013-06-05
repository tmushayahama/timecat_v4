<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Restore");
$this->breadcrumbs = array(
		UserModule::t("Login") => array('/user/login'),
		UserModule::t("Restore"),
);
?>

<?php if (Yii::app()->user->hasFlash('recoveryMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
	</div>
<?php else: ?>

	<div class="form">
		<?php echo CHtml::beginForm(); ?>

		<?php echo CHtml::errorSummary($form); ?>
		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo CHtml::activeLabel($form, 'login_or_email', array('class' => 'right')); ?>

					</div>
					<div class="small-9 columns">
						<?php echo CHtml::activeTextField($form, 'login_or_email', array('placeholder' => 'username@email.com')); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns text-right">
				<?php echo CHtml::submitButton(UserModule::t("Restore"), array('class' => 'button')); ?>
			</div>
		</div>

		<?php echo CHtml::endForm(); ?>
	</div><!-- form -->
<?php endif; ?>