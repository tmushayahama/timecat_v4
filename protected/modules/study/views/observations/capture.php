<?php
$this->beginContent('//layouts/tc_main');


Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/clpclocker.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/tc_components.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/tre_capture.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
	var record_task_url = "<?php echo Yii::app()->createUrl('study/observations/recordtask'); ?>"
</script>
<div id="wrap" class="blangradient">
	<div id="cabecera" class="plomito bordinf">
		<div class="capinfo left">
			<span>
				<span class="hide-for-small">Current time: </span>
				<span class="show-for-small">Time: </span>
				<strong>
					<span id="currenttime" class="clocks">
						<span class="hors"><?php echo $current_time->format('H'); ?></span>:
						<span class="mins"><?php echo $current_time->format('i'); ?></span>:
						<span class="secs"><?php echo $current_time->format('s'); ?></span>
					</span>
				</strong></span><input type="hidden" name="startedtime" id="begintim" class="letaskstamp" value="01:46:49">
		</div> 
		<div class="capinfo left">
			<span>| <span class="hide-for-small">Total duration: </span><span class="show-for-small">Duration: </span><strong><span id="elapsedtime" class="clocks" data-timer="true"><span class="hors"><?php echo $observation_duration->format('%H'); ?></span>h <span class="mins"><?php echo $observation_duration->format('%i'); ?></span>m <span class="secs"><?php echo $observation_duration->format('%s'); ?></span>s</span> </strong></span>
		</div>
		<div class="left">
			<a href="#" id="noter1" class="button secondary nomargin"><span class="hide-for-small">Notes</span><span class="show-for-small"><i class="foundicon-edit "></i></span></a>
		</div>
		<div id="quiter" class="right">
			<a href="#" data-reveal-id="myModal" class="button alert nomargin"><span class="hide-for-small">End observation</span><span class="show-for-small"><i class="foundicon-flag "></i></span></a>
		</div>		
	</div>
	<div id="observelog" class="cnada blanko">
		<div id="titenote" class="anote grisos">
			<p class="oblog"><strong>Observation log</strong></p>
		</div>
		<div id="thenotes" class="blanko">
			<div class="onenote">
				<p class="oblog"><span class="notetime">01:46:49</span> - <span class="notetype">Global note</span><br/>
					<em><span class="oblog notexts">Observation started OK.</span></em></p>
			</div>
		</div>
		<div id="neonote" class="a64 grisos">
			<div id="notetypo" data-tkinstid="0">General note</div>
			<div id="newnoter" class="noteinput left">
				<textarea id="newnote" name="newnote" placeholder="Write your notes here..."></textarea>
			</div>
			<div class="savebuton right">
				<a id="notecloser" href="#" class="button secondary small a50"><i class="foundicon-up-arrow"></i></a>
			</div>
		</div>
	</div>
	<div id="main">
		<?php
		$panelCount = 1;
		foreach (array_keys($categorized_tasks) as $panelName):
			?>
			<div class="row megablock">
				<div class="large-12 columns">
					<br/>
					<div class="row">
						<div class="small-12 columns">
							<h5 class="bburdeo atitle"><?php echo $panelName; ?></h5>
						</div>
					</div>
					<div class="row unikdimenblock blanko bsup1">
						<div class="large-7 columns cnada">
							<div class="tareaslist">&nbsp;
								<?php
								foreach ($categorized_tasks[$panelName] as $task) {
									echo CHtml::link($task->name, '', array(
											'task-id' => $task->id,
											'observation-id' => $observation_id,
											'dimension-id' => $dimensions[$panelName],
											'class' => 'button small secondary round task-btn'));
								}
								?>
							</div>
						</div>
						<div class="large-5 columns cnada">
							<?php if ($current_tasks[$panelName] != null) : ?>
								<div class="actilist fblanco masgrande">
									<div class="holder">
										<div class="listblock limpia papa ">
											<div class="statindicator limpia">
												<div class="aleditar aparece">
													<input type="text" name="freetexttask" class="left"><a href="#" class="saveledit button small success left">Save</a>
												</div>
												<div class="normal">
													<span id="<?php echo 'current-task-' . $dimensions[$panelName] ?>"
																class="tasknamer taknamep eliseo left" 
																current-task-id="<?php echo $current_tasks[$panelName]->studyTask->id; ?>">					
																	<?php echo $current_tasks[$panelName]->studyTask->name; ?>
													</span>
													<a href="#" class="button alert small right borrat">Delete</a>
													<a href="#" class="button small right tasktrig" data-tkid="1">Stop</a>
												</div>
											</div>
											<div class="maininfo limpia">
												&nbsp;&nbsp;<b>Started at: </b>
												<span id="<?php echo 'current-task-start-time-' . $dimensions[$panelName] ?>" class="letaskstamp">
													<?php
													$currentTaskStartTime = new DateTime('@' . $current_tasks[$panelName]->start_time);
													echo $currentTaskStartTime->format('H:i:s');
													?>
												</span>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<b>Duration: </b>
												<span class="clocks taskruat" data-timer="true">
													<?php
													$currentTaskDuration = $current_time->diff($currentTaskStartTime);
													?>
													<span id="<?php echo 'current-task-duration-hours-' . $dimensions[$panelName] ?>" class="hors"><?php echo $currentTaskDuration->format("%H"); ?></span>h 
													<span id="<?php echo 'current-task-duration-mins-' . $dimensions[$panelName] ?>" class="mins"><?php echo $currentTaskDuration->format("%i"); ?></span>m 
													<span id="<?php echo 'current-task-duration-secs-' . $dimensions[$panelName] ?>" class="secs"><?php echo $currentTaskDuration->format("%s"); ?></span>s
												</span>
											</div>
											<div class="acciones limpia">
												<a href="#" class="editer button secondary small left">Edit name</a>
												<a href="#" class="timfix button secondary small left">Fix time</a>
												<a href="#" class="linkto button secondary small left ">Link to</a>
												<a href="#" class="singlenote button secondary small right">Add note</a>
											</div>
										</div>
									</div>
									<div id="<?php echo 'recorded-tasks-' . $dimensions[$panelName] ?>">
										<?php foreach ($categorized_observation_tasks[$panelName] as $task): ?>
											<div class="fullist limpia grisos papa">
												<p>
													<span class="tasknamer letaskname eliseo left" task-id="<?php echo $task->id ?>">
														<?php echo $task->studyTask->name; ?>
													</span>
													<a href="#" class="breaknotifier button secondary small "><i class="foundicon-checkmark"></i></a>
													<i class="foundicon-down-arrow "></i><span class="letaskstamp ">
														<?php
														$task_start_time = new DateTime('@' . $task->start_time);
														//$task_start_time->setTimeZone(new DateTimeZone($site_timezone));
														echo $task_start_time->format("h:i:s");
														?>
													</span>
													<a href="#" class="linkfrom button small right aparece">Select</a>
													<a href="#" class="singlenote button secondary small right"><i class="foundicon-edit"></i></a>
												</p>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<div id="myModal" class="reveal-modal small">
	<h2>Finish your observation.</h2>
	<p class="lead">How do you want to store this observation?</p>
	<p>I want to <a href="completer.php" class="button small success">Save</a> the observation.</p>
	<p> - or - </p>
	<p>I want to <a href="completer.php?trash=yes" class="button small alert">Delete</a> the observation.</p>

	<a class="close-reveal-modal">&#215;</a>
</div>

<?php $this->endContent(); ?>
