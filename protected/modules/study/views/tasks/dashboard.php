<?php $this->beginContent('//study_layouts/study_nav'); ?>
<div class="row">
	<br/>
	<div class="small-12 columns">
		<a href="onsestudy.html" class="button tiny">Study Home</a>
		&gt;
		<a href="tasks.html" class="button tiny bnaranjo2">Task List</a>
	</div>
</div>

<div class="row">
	<div class="large-7 columns">
		<div class="row">
			<p class="nomarg"><b>Task group "single" </b><a href="#" class="button tiny secondary">Change name</a></p>
		</div>
		<div class="row margibotom">
			<div class="large-11 large-centered columns regordoon blanko sear">
				<div class="row minpad">
					<div class="large-2 columns">
						<strong>Name:</strong>
					</div>
					<div class="large-10 columns tkid" data-tkid="1">
						<span class="vnam">Task one</span>
						<span class="statuser bverdon">active</span>
					</div>
				</div>

				<div class="row minpad">
					<div class="large-2 columns">
						<strong>Definition:</strong>
					</div>
					<div class="large-10 columns vdef">
						This corresponds to the action of doing x by z in a context of z, usually around j and i.
					</div>
				</div>
				<div class="row minpad">
					<div class="large-2 columns">
						<strong>Starts:</strong>
					</div>
					<div class="large-10 columns vstars">
						The identifiable milestone is the moment when...
					</div>
				</div>
				<div class="row minpad">
					<div class="large-2 columns">
						<strong>Ends:</strong>
					</div>
					<div class="large-10 columns vends">
						The identifiable milestone is the moment when...
					</div>
				</div>
				<div class="row celeste">
					<div class="small-12 columns text-right">
						<a href="#" class="button small secondary nomarg editers">Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="large-5 columns">
		<div class="row">
			<div class="large-11 large-centered columns blanko ">
				<?php
				$form = $this->beginWidget('CActiveForm', array(
						'id' => 'tasks-form',
						'enableAjaxValidation' => false,
				));
				?>
				<div>
					<div class="row bluerer">
						<div class="large-12 columns">
							<h5>Add new task</h5>
						</div>
					</div>
					<div>
						<div class="row">
							<div class="large-9 large-centered columns celeste inputers">
								<div class="row">
									<div class="large-3 columns">
										<label for="taskname2">Name</label>
									</div>
									<div class="large-9 columns">
										<?php echo $form->textField($task_model, 'name', array('maxlength' => 50)); ?>
										<?php echo $form->error($task_model, 'name'); ?>
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
										<?php echo $form->textArea($task_model, 'definition', array('rows' => 6, 'maxlength' => 255)); ?>
										<?php echo $form->error($task_model, 'definition'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="large-9 large-centered columns celeste inputers">
								<div class="row">
									<div class="large-3 columns">
										<label for="tstarts2" >Starts</label>
									</div>
									<div class="large-9 columns">
										<?php echo $form->textField($task_model, 'name', array('maxlength' => 50)); ?>
										<?php echo $form->error($task_model, 'name'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="large-9 large-centered columns celeste inputers">
								<div class="row">
									<div class="large-3 columns">
										<label for="tends2" >Ends</label>
									</div>
									<div class="large-9 columns">
										<?php echo $form->textField($task_model, 'name', array('maxlength' => 50)); ?>
										<?php echo $form->error($task_model, 'name'); ?>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="small-12 columns text-right">
								<?php echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Create New Task'); ?>
							</div>
						</div>
						<?php
						?>
						<?php $this->endWidget(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php //echo $form->dropDownList($task_model, 'category_id', CHtml::listData($task_types, 'id', 'type_entry')); //$task_types);  ?>
	<?php // echo $form->error($task_model, 'category_id'); ?>

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
			echo CHtml::tag('button', array('name' => 'update', 'class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Save Changes');
			?>
		</div>
	</div>
	<a class="close-reveal-modal">&#215;</a>
	<?php $this->endWidget(); ?>
</div>
<?php $this->endContent(); ?>
