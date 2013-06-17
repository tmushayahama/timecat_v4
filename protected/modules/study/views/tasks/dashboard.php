<?php $this->beginContent('//home_layouts/study_layouts/study_main_2'); ?>



<table>
  <thead>
    <tr>
      <th width="200">Task Name</th>
      <th>Task Category</th>
      <th width="150">Task Definition</th>
      <th width="150">Task Status</th>
			<th width="150">Action</th>
    </tr>
  </thead>
  <tbody>
		<tr>
	<div class="form">

		<?php
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'tasks-form',
				'enableAjaxValidation' => false,
		));
		?>
		<td>	
			<?php echo $form->textField($task_model, 'name', array('size' => 50, 'maxlength' => 50)); ?>
			<?php echo $form->error($task_model, 'name'); ?>
		</td>
		<td>
			<?php echo $form->dropDownList($task_model, 'category_id', $task_types); ?>
			<?php echo $form->error($task_model, 'category_id'); ?>
		</td>
		<td>
			<?php echo $form->textField($task_model, 'definition', array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($task_model, 'definition'); ?>
		</td>
		<td>
			<?php echo $form->textField($task_model, 'description', array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($task_model, 'description'); ?>
		</td>
		<td>
			<?php echo CHtml::submitButton($task_model->isNewRecord ? 'Create' : 'Save'); ?>
		</td>
		<?php $this->endWidget(); ?>
    </tr>
		<?php foreach ($study_tasks as $task): ?>
			<tr>
				<td><?php echo $task->task->name ?></td>
				<td><?php echo $task->task->category->type_entry ?></td>
				<td><?php echo $task->task->definition ?></td>
				<td><?php echo $task->status ?></td>
				<td><?php echo $task->task->name ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
</table>

<?php $this->endContent(); ?>
