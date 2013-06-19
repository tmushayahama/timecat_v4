<?php $this->beginContent('//home_layouts/study_layouts/study_main_2'); ?>
<table>
  <thead>
    <tr>
      <th width="150">Task Name</th>
      <th width="100">Task Category</th>
      <th width="200">Task Definition</th>
      <th width="100">Task Status</th>
			<th width="100">Action</th>
    </tr>
  </thead>
  <tbody>
		<tr>
			<?php
			$form = $this->beginWidget('CActiveForm', array(
					'id' => 'tasks-form',
					'enableAjaxValidation' => false,
			));
			?>
			<td>	
				<?php echo $form->textField($task_model, 'name', array('maxlength' => 50)); ?>
				<?php echo $form->error($task_model, 'name'); ?>
			</td>
			<td>
				<?php echo $form->dropDownList($task_model, 'category_id', CHtml::listData($task_types, 'id', 'type_entry')); //$task_types); ?>
				<?php echo $form->error($task_model, 'category_id'); ?>
			</td>
			<td>
				<?php echo $form->textArea($task_model, 'definition', array('maxlength' => 255)); ?>
				<?php echo $form->error($task_model, 'definition'); ?>
			</td>
			<td>
				<?php echo $form->textField($study_task_model, 'status', array('maxlength' => 255)); ?>
				<?php echo $form->error($study_task_model, 'status'); ?>
			</td>
			<td>
				<?php
				echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Add');
				?>
			</td>
			<?php $this->endWidget(); ?>
    </tr>
		<?php foreach ($study_tasks as $task): ?>
			<tr id="<?php echo 'task' . $task->id ?>">
				<td id="<?php echo 'task-name' . $task->id ?>">
					<?php echo $task->task->name ?>
				</td>
				<td id="<?php echo 'task-category' . $task->id ?>">
					<?php echo $task->task->category->type_entry ?>
				</td>
				<td id="<?php echo 'task-definition' . $task->id ?>">
					<?php echo $task->task->definition ?>
				</td>
				<td id="<?php echo 'task-status' . $task->id ?>">
					<?php echo $task->status ?>
				</td>
				<td>
					<ul class="button-group even two-up">
						<li>
							<?php echo CHtml::link('<i class="foundicon-tools" ></i>', '', array('data-reveal-id' => 'edit-task-modal', 'update-target-id' => $task->id, 'class' => 'task-edit tiny button radius secondary entrar')); ?>
						</li>
						<li>
							<?php echo CHtml::link('<i class="foundicon-remove" ></i>', Yii::app()->getModule('user')->profileUrl, array('delete-target' => $task->id, 'class' => 'tiny button alert radius entrar')); ?>
						</li>
					</ul>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<div id="edit-task-modal" class="reveal-modal medium">
  <h2>Edit Task.</h2>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'tasks-form',
			'enableAjaxValidation' => false,
	));
	?>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($task_model, 'name'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textField($task_model, 'name', array('id' => 'edit-taskname-field', 'maxlength' => 50)); ?>
					<?php echo $form->error($task_model, 'name'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($task_model, 'category_id'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->dropDownList($task_model, 'category_id', CHtml::listData($task_types, 'id', 'type_entry'), array('id' => 'edit-taskcategory-field')); ?>
					<?php echo $form->error($task_model, 'category_id'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($task_model, 'definition'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textArea($task_model, 'definition', array('id' => 'edit-taskdefinition-field', 'maxlength' => 255)); ?>
					<?php echo $form->error($task_model, 'definition'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($study_task_model, 'status'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textField($study_task_model, 'status', array('id' => 'edit-taskstatus-field')); ?>
					<?php echo $form->error($study_task_model, 'status'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns text-right">
			<?php
			echo CHtml::tag('button', array('name'=>'update', 'class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Save Changes');
			?>
		</div>
	</div>
  <a class="close-reveal-modal">&#215;</a>
	<?php $this->endWidget(); ?>
</div>
<?php $this->endContent(); ?>
