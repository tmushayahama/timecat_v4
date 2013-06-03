<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");

?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<?php echo CHtml::link('Change Avatar', 'avatar/create') ?>
<?php echo CHtml::link('Change Password', 'recovery/changepassword') ?>
<table>
    <tr>
	<th class=""><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
	<td><?php echo CHtml::encode($model->email); ?></td>
    </tr>
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr>
	<th class=""><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	
   </tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
	?>
	<tr>
		<th class=""><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
    	<td><?php echo $model->create_at; ?></td>
	</tr>
</table>
