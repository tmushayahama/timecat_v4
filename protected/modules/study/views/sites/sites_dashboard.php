<?php $this->beginContent('//home_layouts/study_layouts/study_main_2'); ?>
<table>
  <thead>
    <tr>
      <th width="150">Site Name</th>
      <th width="100">Site Timezone</th>
      <th width="200">Extra Information</th>
			<th width="100">Action</th>
    </tr>
  </thead>
  <tbody>
		<tr>
			<?php
			$form = $this->beginWidget('CActiveForm', array(
					'id' => 'sites-form',
					'enableAjaxValidation' => false,
			));
			?>
			<td>	
				<?php echo $form->textField($sites_model, 'name', array('maxlength' => 50)); ?>
				<?php echo $form->error($sites_model, 'name'); ?>
			</td>
			<td>
				<?php echo $form->dropDownList($sites_model, 'timezone', CHtml::listData($sites_timezones, 'name', 'name')); //$sites_types); ?>
				<?php echo $form->error($sites_model, 'timezone'); ?>
			</td>
			<td>
				<?php echo $form->textArea($sites_model, 'description', array('maxlength' => 255)); ?>
				<?php echo $form->error($sites_model, 'description'); ?>
			</td>
			<td>
				<?php
				echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Add');
				?>
			</td>
			<?php $this->endWidget(); ?>
    </tr>
		<?php foreach ($study_sites as $sites): ?>
			<tr>
				<td id="<?php echo 'sites-name' . $sites->id ?>">
					<?php echo $sites->name ?>
				</td>
				<td id="<?php echo 'sites-timezone' . $sites->id ?>">
					<?php echo $sites->timezone ?>
				</td>
				<td id="<?php echo 'sites-description' . $sites->id ?>">
					<?php echo $sites->description ?>
				</td>
				<td>
					<ul class="button-group even two-up">
						<li>
							<?php echo CHtml::link('<i class="foundicon-tools" ></i>', '', array('data-reveal-id' => 'edit-sites-modal', 'update-target-id' => $sites->id, 'class' => 'sites-edit tiny button radius secondary entrar')); ?>
						</li>
						<li>
							<?php echo CHtml::link('<i class="foundicon-remove" ></i>', Yii::app()->getModule('user')->profileUrl, array('delete-target' => $sites->id, 'class' => 'tiny button alert radius entrar')); ?>
						</li>
					</ul>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div id="edit-sites-modal" class="reveal-modal medium">
  <h2>Edit Site.</h2>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'sites-form',
			'enableAjaxValidation' => false,
	));
	?>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($sites_model, 'name'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textField($sites_model, 'name', array('id' => 'edit-sitesname-field', 'maxlength' => 50)); ?>
					<?php echo $form->error($sites_model, 'name'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
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
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($sites_model, 'description'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textArea($sites_model, 'description', array('id' => 'edit-sitesdescription-field', 'maxlength' => 255)); ?>
					<?php echo $form->error($sites_model, 'description'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns text-right">
			<?php
			echo CHtml::tag('button', array('name' => 'update', 'class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Save Changes');
			?>
		</div>
	</div>
  <a class="close-reveal-modal">&#215;</a>
	<?php $this->endWidget(); ?>
</div>
<?php $this->endContent(); ?>
