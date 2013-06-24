<?php
/* @var $this TasksController */
/* @var $model Tasks */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
		'id' => 'study-tasks-form',
		'enableAjaxValidation' => false,
				));
?>
<?php echo $form->errorSummary($tasks_model); ?>
<div class="row">
	<div class="large-9 large-centered columns celeste inputers">
		<div class="row">
			<div class="large-3 columns">
				<?php echo $form->labelEx($tasks_model, 'name'); ?>
			</div>
			<div class="large-9 columns">
				<?php echo $form->textField($tasks_model, 'name', array('maxlength' => 50)); ?>
				<?php echo $form->error($tasks_model, 'name'); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-9 large-centered columns celeste inputers">
		<div class="row">
			<div class="small-3 columns">
				<label for="definit2" >Definition</label>
			</div>
			<div class="small-9 columns">
				<?php echo $form->textArea($tasks_model, 'definition', array('rows' => 6, 'maxlength' => 255)); ?>
				<?php echo $form->error($tasks_model, 'definition'); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-9 large-centered columns celeste inputers">
		<div class="row">
			<div class="large-3 columns">
				<?php echo $form->labelEx($tasks_model, 'start_action'); ?>
			</div>
			<div class="large-9 columns">
				<?php echo $form->textField($tasks_model, 'start_action', array('size' => 60, 'maxlength' => 255)); ?>
				<?php echo $form->error($tasks_model, 'start_action'); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-9 large-centered columns celeste inputers">
		<div class="row">
			<div class="large-3 columns">
				<?php echo $form->labelEx($tasks_model, 'end_action'); ?>
			</div>
			<div class="large-9 columns">
				<?php echo $form->textField($tasks_model, 'end_action', array('size' => 60, 'maxlength' => 255)); ?>
				<?php echo $form->error($tasks_model, 'end_action'); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 columns text-right">
		<?php //echo CHtml::submitButton($task_model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Create New Task'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

