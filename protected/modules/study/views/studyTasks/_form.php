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
	<div class="large-10 large-centered columns celeste inputers">
		<div class="row">
			<div class="large-3 columns">
				<?php echo $form->labelEx($tasks_model, 'category_id'); ?>
			</div>
			<div class="large-9 columns">
				<?php echo $form->dropDownList($tasks_model, 'dimension_id', CHtml::listData($task_types, 'id', 'dimension')); //$task_types);   ?>
				<?php echo $form->error($tasks_model, 'dimension_id'); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="large-10 large-centered columns celeste inputers">
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
	<div class="large-10 large-centered columns celeste inputers">
		<div class="row">
			<div class="small-3 columns">
				<?php echo $form->labelEx($tasks_model, 'definition'); ?>
			</div>
			<div class="small-9 columns">
				<?php echo $form->textArea($tasks_model, 'definition', array('rows' => 6, 'maxlength' => 255)); ?>
				<?php echo $form->error($tasks_model, 'definition'); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-10 large-centered columns celeste inputers">
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
	<div class="large-10 large-centered columns celeste inputers">
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
		<?php //echo CHtml::submitButton($task_model->isNewRecord ? 'Create' : 'Save');   ?>
		<?php echo CHtml::tag('button', array('class' => 'button'), 'Create Task'); ?>
	</div>
</div>

<?php if (false)://$study_type_id >= Study::$multiactor_type_id): ?>
	<!--    <div class="row">
	        <div class="large-11 large-centered columns blanko ">
	            <div class="row bluerer">
	                <div class="large-12 columns">
	                    <h5>Manage dimensions</h5>
	                </div>
	            </div>
	            <div class="row">
	                <div class="large-12 columns oblog">
	<?php foreach ($task_types as $type): ?>
		                        <p class="limpia"><form method="post" action="#" class="updadimen">
		                            <span class="negrita">////<?php echo $type->category->type_entry ?></span>
		                            <input type="text" name="newdimename" value="////<?php echo $type->category->type_entry ?>" class="left dimeninput aparece" />
		                            <input type="submit" value="Change name" href="#" class="right small dimnamchan button"><a href="#" class="ledimcancel right small alert button aparece">Cancel</a><input type="hidden" name="dimenx" class="dimenx" value="////<?php echo $type->category->type_entry ?>" /></form>
		                        </p><hr>
	<?php endforeach; ?>
	                </div>
	            </div>
	        </div>
	    </div>-->
<?php endif; ?>

<?php $this->endWidget(); ?>

