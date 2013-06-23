<?php $this->beginContent('//home_layouts/study_layouts/study_main_2'); ?>
<?php echo CHtml::link('<i class="foundicon-plus" >Add</i>', '', array('data-reveal-id' => 'create-observations-modal',  'class' => 'observations-edit medium button radius entrar')); ?>
<table>
  <thead>
    <tr>
      <th width="50">Id</th>
      <th width="100">Observer</th>
      <th width="100">Subject</th>
      <th width="100">Site</th>
			<th width="100">Begin</th>
			<th width="100">End</th>
			<th width="100">Duration</th>
			<th width="100">Action</th>
    </tr>
  </thead>
  <tbody>
		<?php foreach ($study_observations as $observations): ?>
			<tr>
				<td id="<?php echo 'observations-id' . $observations->id ?>">
					<?php echo $observations->id ?>
				</td>
				<td id="<?php echo 'observations-observer' . $observations->id ?>">
					<?php echo $observations->user_id ?>
				</td>
				<td id="<?php echo 'observations-site' . $observations->id ?>">
					<?php echo $observations->site->name ?>
				</td>
				<td id="<?php echo 'observations-status' . $observations->id ?>">
					<?php echo $observations->start_time ?>
				</td>
				<td>
					<ul class="button-group even two-up">
						<li>
							<?php echo CHtml::link('<i class="foundicon-tools" ></i>', '', array('data-reveal-id' => 'edit-observations-modal', 'update-target-id' => $observations->id, 'class' => 'observations-edit tiny button radius secondary entrar')); ?>
						</li>
						<li>
							<?php echo CHtml::link('<i class="foundicon-remove" ></i>', Yii::app()->getModule('user')->profileUrl, array('delete-target' => $observations->id, 'class' => 'tiny button alert radius entrar')); ?>
						</li>
					</ul>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div id="create-observations-modal" class="reveal-modal medium">
  <h2>Edit Task.</h2>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'observations-form',
			'enableAjaxValidation' => false,
	));
	?>
	<?php echo CHtml::errorSummary($observations_model); ?>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($observations_model, 'user_id'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textField($observations_model, 'user_id', array('maxlength' => 50)); ?>
					<?php echo $form->error($observations_model, 'user_id'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($observations_model, 'site_id'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->dropDownList($observations_model, 'site_id', CHtml::listData($observations_sites, 'id', 'name'), array('id' => 'edit-observationscategory-field')); ?>
					<?php echo $form->error($observations_model, 'site_id'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($observations_model, 'subjectDescription'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textArea($observations_model, 'subjectDescription', array('id' => 'edit-observationsdefinition-field', 'maxlength' => 255)); ?>
					<?php echo $form->error($observations_model, 'subjectDescription'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns text-right">
			<?php
			echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Save Changes');
			?>
		</div>
	</div>
  <a class="close-reveal-modal">&#215;</a>
	<?php $this->endWidget(); ?>
</div>
<?php $this->endContent(); ?>
