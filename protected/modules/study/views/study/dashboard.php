<?php
$this->beginContent('//study_layouts/study_nav');
Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl . '/js/tre_study.js', CClientScript::POS_END
);
?>
<div class="row">
	<br/>
	<div class="small-12 columns">
		<a href="onsestudy.html" class="button tiny">Study Home</a>
	</div>
</div>
<div class="row ">
	<div class="large-6 columns">
		<div class="row">
			<div class="small-6 columns marabajo">
				<?php if ($resume_observation == null): ?>
					<a href="#" data-reveal-id="startobservation">
						<div class="small-11 small-centered columns clptabs bazul1">
							<br/>
							<div class="row elicon">
								<div class="small-10 small-centered columns">
									<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_plus.png', "new observations"); ?>
								</div>
							</div>
							<div class="row">
								<div class="small-11 small-centered columns">
									<p class="eliseo subtile">New Observation</p>
								</div>
							</div>
						</div>
					</a>
				<?php else: ?>
					<a href="<?php echo Yii::app()->request->baseUrl . '/study/observations/capture/studyId/' . $study_model->id . '/observationId/' . $resume_observation->id ?>">
						<div class="small-11 small-centered columns clptabs bazul1">
							<br/>
							<div class="row elicon">
								<div class="small-10 small-centered columns">
									<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_plus.png', "new observations"); ?>
								</div>
							</div>
							<div class="row">
								<div class="small-11 small-centered columns">
									<p class="eliseo subtile">Resume Observation</p>
								</div>
							</div>
						</div>
					</a>
				<?php endif; ?>
			</div>
			<div class="small-6 columns marabajo">
				<a href="#">
					<div class="small-11 small-centered columns clptabs brojo">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_viewer.png', "workflow viewer"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Workflow Viewer</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="row">
			<div class="small-6 columns marabajo">
				<a href="#">
					<div class="small-11 small-centered columns clptabs bverde">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_reports.png', "reports"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Reports</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="small-6 columns marabajo">
				<a href="<?php echo Yii::app()->request->baseUrl . '/study/messages/index/studyId/' . $study_model->id . "/messageId/0"; ?>" >
					<div class="small-11 small-centered columns clptabs bnaranjo">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_mail.png', "messages"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Messages</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="large-6 columns">
		<div class="row">
			<div class="small-6 columns marabajo">
				<a href="/timecat_v4/study/userstudies/dashboard/studyId/<?php echo $study_model->id ?>" >
					<div class="small-11 small-centered columns clptabs bmorado">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_users.png', "observers"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Observers</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="small-6 columns marabajo">
				<a href="/timecat_v4/study/studytasks/dashboard/studyId/<?php echo $study_model->id ?>" >
					<div class="small-11 small-centered columns clptabs bnaranjo2">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_tlist.png', "task list"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Task List</p>
							</div>
						</div>

					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="row">
			<div class="small-6 columns marabajo">
				<a href="/timecat_v4/study/sites/dashboard/studyId/<?php echo $study_model->id ?>" >
					<div class="small-11 small-centered columns clptabs bceleste">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_sites.png', "sites"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Sites</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="small-6 columns marabajo">
				<a href="#">
					<div class="small-11 small-centered columns clptabs bburdeo">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_calendar.png', "calendar"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Calendar</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-6 columns">
		<div class="row">
			<div class="small-6 columns marabajo">
				<a href="#">
					<div class="small-11 small-centered columns clptabs bverdon">
						<br/>
						<div class="row elicon">
							<div class="small-10 small-centered columns">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/b_export.png', "data export"); ?>
							</div>
						</div>
						<div class="row">
							<div class="small-11 small-centered columns">
								<p class="eliseo subtile">Data Export</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="small-6 columns marabajo">

			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="row">
			<div class="small-6 columns marabajo">

			</div>
			<div class="small-6 columns marabajo">

			</div>
		</div>
	</div>
</div>
<div id="startobservation" class="reveal-modal medium">
	<h2>Begin new observation.</h2>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'observation-form',
			'enableAjaxValidation' => false,
	));
	?>
	<p class="lead">To start the observation, please specify a site and a subject/tag.</p>
	<?php echo $form->dropDownList($observations_model, 'site_id', CHtml::listData($observation_sites, 'id', 'name'), array('id' => 'edit-observationscategory-field')); ?>
	<?php echo $form->error($observations_model, 'site_id'); ?>
	<p>Indicate a subject or a tag (optional) <span data-tooltip class="has-tip" title="Specifying a subject or a Tag, will allow you to group your observations by an extra parameter in the analysis process(i.e.Nurse A)"> (What is this?)</span></p>
	<?php echo $form->textField($observations_model, 'subjectDescription', array('placeholder' => 'i.e. Subject id 234, or code 344', 'maxlength' => 255)); ?>
	<?php echo $form->error($observations_model, 'subjectDescription'); ?>
	<p>Select the type of the observation <span data-tooltip class="has-tip" title="I.O.R.A stands for Inter Observer Reliability Assessment. Training observation data is not included in final reports."> (?)</span>.</p>
	<?php
	$radioBtnIndex = 1;
	foreach ($observation_types as $observation_type) {
		echo CHtml::link($observation_type->description, '', array('class' => 'button secondary observations-type-btn', 'radio-btn-target' => 'observation-type' . $radioBtnIndex));
		echo $form->radioButton($observations_model, 'type_id', array('id' => 'observation-type' . $radioBtnIndex, 'class' => 'tc-hide', 'value' => $observation_type->id, 'uncheckValue' => null));
		$radioBtnIndex++;
	}
	?>
	<br/>
	<?php echo CHtml::submitButton('Begin observation', array('class' => 'button right')); ?>
	<?php $this->endWidget(); ?>		
	<a class="close-reveal-modal">&#215;</a>
</div>	
<?php $this->endContent(); ?>
