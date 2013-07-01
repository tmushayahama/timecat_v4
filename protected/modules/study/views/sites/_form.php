<?php
$form = $this->beginWidget('CActiveForm', array(
		'id' => 'sites-form',
		'enableAjaxValidation' => false,
				));
?>
<div class="row">
	<div class="large-11 large-centered columns blanko ">
		<div class="row bluerer">
			<div class="large-12 columns">
				<h5>Add new site</h5>
			</div>
		</div>
		<div class="row">
			<div class="large-10 large-centered columns celeste inputers">
				<div class="row">
					<div class="large-3 columns">
						<?php echo $form->labelEx($sites_model, 'name'); ?>
					</div>
					<div class="large-9 columns">
						<?php echo $form->textField($sites_model, 'name', array('maxlength' => 50)); ?>
						<?php echo $form->error($sites_model, 'name'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-10 large-centered columns celeste inputers">
				<div class="row">
					<div class="large-3 columns">
						<?php echo $form->labelEx($sites_model, 'timezone'); ?>
					</div>
					<div class="large-9 columns">
						<?php echo $form->dropDownList($sites_model, 'timezone', CHtml::listData($sites_timezones, 'name', 'name')); //$sites_types); ?>
						<?php echo $form->error($sites_model, 'timezone'); ?>
					</div>
				</div>	 
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns text-right">
				<?php echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Add'); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>