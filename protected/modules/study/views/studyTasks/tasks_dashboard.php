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
		<?php foreach ($study_tasks as $task): ?>
			<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear">
					<div class="row minpad">
						<div class="large-2 columns">
							<strong>Name:</strong>
						</div>
						<div class="large-10 columns tkid" data-tkid="1">
							<span class="vnam"><?php echo $task->name; ?></span>
							<span class="statuser bverdon">active</span>
						</div>
					</div>

					<div class="row minpad">
						<div class="large-2 columns">
							<strong>Definition:</strong>
						</div>
						<div class="large-10 columns vdef">
							<?php echo $task->definition; ?>
						</div>
					</div>
					<div class="row minpad">
						<div class="large-2 columns">
							<strong>Starts:</strong>
						</div>
						<div class="large-10 columns vstars">
							<?php echo $task->start_action; ?>
						</div>
					</div>
					<div class="row minpad">
						<div class="large-2 columns">
							<strong>Ends:</strong>
						</div>
						<div class="large-10 columns vends">
							<?php echo $task->end_action; ?>
						</div>
					</div>
					<div class="row celeste">
						<div class="small-12 columns text-right">
							<a href="#" class="button small secondary nomarg editers">Edit</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="large-5 columns">
		<div class="row">
			<div class="large-11 large-centered columns blanko ">
				<div>
					<div class="row bluerer">
						<div class="large-12 columns">
							<h5>Add new task</h5>
						</div>
					</div>
					<div>
						<?php echo $this->renderPartial('_form', array('tasks_model' => $task_model)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php //echo $form->dropDownList($task_model, 'category_id', CHtml::listData($task_types, 'id', 'type_entry')); //$task_types);  ?>
<?php // echo $form->error($task_model, 'category_id'); ?>
<?php $this->endContent(); ?>
