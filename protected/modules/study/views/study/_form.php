<?php
/* @var $this StudyController */
/* @var $model Study */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
		'id' => 'study-form',
		'enableAjaxValidation' => false,
				));
?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="large-9 large-centered columns celeste inputers">
		<div class="row">
			<div class="small-3 columns">
				<?php echo $form->labelEx($model, 'name', array('class' => 'right')); ?>
			</div>
			<div class="small-9 columns">
				<?php echo $form->textField($model, 'name', array('maxlength' => 50, 'placeholder' => 'Study Name')); ?>
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
				<?php echo $form->textArea($model, 'description', array('rows' => 6, 'maxlength' => 255, 'placeholder' => 'Please provide a short description of the aims of your study')); ?>
				<?php echo $form->error($model, 'description'); ?>
			</div>
		</div>
	</div>
</div>
<div class="row bluerer masabajo">
	<div class="large-12 columns">
		<h4>Select the data schema:</h4>
	</div>
</div>


<?php foreach ($roles as $role): ?>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="small-12 columns">
					<p><strong><?php echo $role->type_entry ?></strong></p>
				</div>
			</div>
			<div class="row">
				<div class="large-7 columns text-center">
					<img src="img/linear1.jpg" alt="seq time">
				</div>
				<div class="large-5 columns">
					<p class="sear"><?php echo $role->description ?></p>
				</div>
			</div>
			<div class="row">
				<div class="small-12 columns text-right">
					<button type="button" class="chooser tiny button">Select</button>
					<?php echo $form->radioButton($model, 'type_id', array('value' => $role->id, 'uncheckValue' => null)); ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<div class="row bluerer masabajo">
	<div class="large-12 columns">
		<h4>Define your Sites:</h4>
	</div>
</div>
<div id="siter1" class="row clonedInput">
	<div class="large-9 large-centered columns celeste inputers">
		<div class="row">
			<div class="small-3 columns">
				<label for="site1" class="right labela">Site 1:</label>
			</div>
			<div class="small-9 columns"> .;3
				<input type="text" name="sitelist[]" id="site1" placeholder="General Med-surg Hospital A">
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-9 large-centered text-right">
		<button type="button" id="remsites" class="alert tiny button aparece">Remove sites</button>
		<button type="button" id="addsites" class="success tiny button">Add more sites</button>
	</div>
</div>
<div class="row">
	<div class="large-9 large-centered columns">
		<div class="small-12 columns text-right">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'button')); ?>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
