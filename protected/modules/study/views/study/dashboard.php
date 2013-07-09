<?php $this->beginContent('//study_layouts/study_nav'); ?>
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
				<a href="/timecat_v4/study/observations/dashboard/studyId/<?php echo $model->id ?>" >
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
				<a href="<?php echo  Yii::app()->request->baseUrl.'/study/messages/index/studyId/'.$model->id."/messageId/0"; ?>" >
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
				<a href="/timecat_v4/study/userstudies/dashboard/studyId/<?php echo $model->id ?>" >
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
				<a href="/timecat_v4/study/studytasks/dashboard/studyId/<?php echo $model->id ?>" >
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
				<a href="/timecat_v4/study/sites/dashboard/studyId/<?php echo $model->id ?>" >
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
<?php $this->endContent(); ?>
