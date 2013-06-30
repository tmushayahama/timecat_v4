<div class="large-5 columns">
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'observers-form',
			'enableAjaxValidation' => false,
	));
	?>
	<div class="row">
		<div class="large-11 large-centered columns blanko ">
			<div class="row bluerer">
				<div class="large-12 columns">
					<h5>Add Observer</h5>
				</div>
			</div>
			<?php echo $form->errorSummary($observer); ?>
			<div class="row">
				<div class="large-10 large-centered columns celeste inputers">
					<div class="row">
						<div class="large-3 columns">
							<?php echo $form->labelEx($observer, 'email'); ?>
						</div>
						<div class="large-9 columns">
							<?php echo $form->textField($observer, 'email', array('maxlength' => 50)); ?>
							<?php echo $form->error($observer, 'email'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-10 large-centered columns studydesc">
					<p>Observers can:<br/>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Create observations</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Visualize own data</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Send messages</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Read task list</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Update calendar</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Export own data</span>
					</p>
				</div>
			</div>
			<div class="row">
				<div id="adminprivileges" class="large-10 large-centered columns studydesc">
					<p>Admins also can:<br/>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Visualize all data</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Access global reports</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Invite new observers</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Add/edit task list</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Add/edit sites</span>
						<span class="studydesc right limpia"><i class="foundicon-checkmark"></i>Export all data</span>
					</p>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="large-10 large-centered columns celeste inputers">
				<div class="row">
					<div class="large-12 columns text-right">
						<?php echo CHtml::activeCheckBox($observer, 'admin', array('value' => 1, 'uncheckValue' => 0)); ?> Grant Admin Privileges
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns text-right">
				<?php echo CHtml::tag('button', array('class' => 'button radius entrar'), '<i class="foundicon-plus"></i> Send Invite'); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div>