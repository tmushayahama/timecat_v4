<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/profile'); ?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
?>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
	</div>
<?php endif; ?>
<div class="large-4 columns">
	<div class="row">
		<h3><small>Account Information</small></h3>
	</div>	
	<div class="row">
		<div class="large-12 columns">
			<p><strong>User:</strong> <?php echo Yii::app()->user->email; ?></p>
			<p><strong>Password:</strong> **************</p>
			<p>
				<?php echo CHtml::link('<i class="foundicon-lock sear" >Change Password</i>', 'recovery/changepassword', array('data-reveal-id' => 'myModal', 'class' => 'small button secondary radius')); ?>

			</p>
		</div>
	</div>

</div>
<div class="large-5 columns">
	<div class="row">
		<h3><small>User Details</small></h3>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<p><strong>First name:</strong> <?php echo Yii::app()->user->firstname; ?></p>
			<p><strong>Last name:</strong> <?php echo Yii::app()->user->lastname; ?></p>
			<p><strong>Institution:</strong> The Ohio State University</p>
			<p>
				<?php echo CHtml::link('<i class="foundicon-edit sear" >Edit Details</i>', 'profile/edit', array('data-reveal-id' => 'myModal2', 'class' => 'small button secondary radius')); ?>
			</p>
		</div>
	</div>			
</div>
<?php $this->endContent() ?>