<?php
/* @var $this StudyController */
/* @var $model Study */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'study-form',
			'enableAjaxValidation' => false,
	));
	?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row bluerer masabajo">
		<div class="large-12 columns">
			<h3>Project Details:</h3>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="small-3 columns">
					<?php echo $form->labelEx($model, 'name', array('class' => 'right')); ?>
				</div>
				<div class="small-9 columns">
					<?php echo $form->textField($model, 'name', array('maxlength' => 50, 'placeholder' => 'project name')); ?>
					<?php echo $form->error($model, 'name'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="small-3 columns">
					<?php echo $form->labelEx($model, 'description', array('class' => 'right')); ?>
				</div>
				<div class="small-9 columns">
					<?php echo $form->textField($model, 'description', array('maxlength' => 255, 'placeholder' => 'project description')); ?>
					<?php echo $form->error($model, 'description'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row bluerer masabajo">
		<div class="large-12 columns">
			<h3>Select the Type of Study:</h3>
		</div>
	</div>
	<?php foreach ($roles as $role): ?>
		<div class="row">
			<div class="small-3 columns">
				<?php echo $role->type_entry ?>
			</div>
			<div class="small-9 columns">
				<?php echo $form->radioButton($model, 'type_id', array('value' => $role->id, 'uncheckValue' => null)); ?>
				<?php echo $role->description ?>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="row">
		<div class="large-9 large-centered columns">
			<div class="small-12 columns text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'button')); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->