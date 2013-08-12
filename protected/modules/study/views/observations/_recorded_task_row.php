<?php
/* @var $this ObservationsController */
/* @var $model Observations */
/* @var $form CActiveForm */
?>
<?php if ($task != null): ?>
	<div class="recorded-task-row fullist limpia grisos papa">
		<p>
			<span class="recorded-task-name tasknamer letaskname eliseo left" task-id="<?php echo $task->id ?>">
				<?php echo $task->studyTask->name; ?>
			</span>
			<a href="#" class="breaknotifier button secondary small "><i class="foundicon-checkmark"></i></a>
			<i class="foundicon-down-arrow "></i><span class="letaskstamp ">
				<?php
				$task_start_time = new DateTime('@' . $task->start_time);
				$task_start_time->setTimeZone(new DateTimeZone($site_timezone));
				echo $task_start_time->format("H:i:s");
				?>
			</span>
			<a href="#" class="linkfrom button small right aparece">Select</a>
			<a href="#" class="recorded-task-note-btn singlenote button secondary small right"><i class="foundicon-edit"></i></a>
		</p>
	</div>
<?php endif; ?>