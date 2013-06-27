<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/home_nav'); ?>
<?php //$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
?>
<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
	</div>
<?php endif; ?>
<div class="row">
	<div class="large-10 columns">
		<div class="row">
			<h3>Studies <small> TimeCaT Projects</small></h3>
		</div>
		<div id="study-row" class="row">
			<?php foreach ($studies as $study):?>
				<div class="large-6 columns">
					<div class="large-11 large-centered columns studyblock">
						<div class="row firstinfo grisos">
							<div class="small-6 columns"><p>Role: <?php echo $study->role->type_entry; ?></p></div>
							<div class="small-6 columns text-right"><p><em>id:<?php echo $study->study_id; ?></em></p></div>
						</div>
						<div class="row blanko">
							<div class="small-12 columns"><p class="eliseo studyname"><?php echo $study->study->name; ?></p></div>
						</div>
						<div class="row blanko">
							<div class="small-12 columns"><p class="studydesc">
									<i class="foundicon-location"></i> <?php echo $this->studySitesCount($study->id); ?> sites<br/>
									<i class="foundicon-address-book"></i> <?php echo $this->studyObserversCount($study->id); ?> observers<br/>
									<i class="foundicon-website"></i> <?php echo $this->studyTasksCount($study->id); ?> tasks
									<br/>
									<i class="foundicon-inbox"></i> <?php echo $this->studyObservationsCount($study->id); ?> observations<br/>
									<i class="foundicon-clock"></i> 40h 02m 27s</p></div>
						</div>
						<div class="row blanko">
							<?php if ($study->pending_request == 1): ?>
								<div class="small-12 columns">
									<?php echo CHtml::link('Decline Invite', "site/deletestudy/studyid/" . $study->study_id, array('class' => 'button alert radius right entrar')); ?>
									<?php echo CHtml::link('Join Study', "study/study/join/studyid/" . $study->study_id, array('class' => 'button radius right entrar')); ?>

								</div>
							<?php else: ?>
								<div class="small-12 columns">
									<?php echo CHtml::link('Access Study', "study/study/dashboard/studyid/" . $study->study_id, array('class' => 'button success radius right entrar')); ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="row lastinfo">
							<div class="small-6 columns"><p>By <strong><?php echo $study->user->profile->firstname; ?></strong></p></div>
							<div class="small-6 columns text-right"><p><em><?php echo $study->study->created; ?></em></p></div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
	<div class="large-2 columns">
		<div class="row">
			<h3>New Study</h3>
		</div>
		<div class="row">
			<?php echo CHtml::link('<i class="foundicon-plus sear" >Create New Study</i>', 'study/study/create', array('class' => 'button expand')); ?>
		</div>	
		<div class="row">
			<h3>Profile</h3>
		</div>
		<div class="row grisos">
			<div class="large-12 small-6 columns grisos profiler">
				<p><br/>
					<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/' . $this->avatar, "avatar", array('alt' => "profile avatar", "width" => 200, 'height' => 200)); ?>  
			</div>
			<div class="large-12 small-6 columns grisos profiler">
				<p><strong>Name:</strong></p>
				<p class="eliseo">
					<?php echo Yii::app()->user->firstname . " " . Yii::app()->user->lastname ?> 
				</p>
				<p><strong>User:</strong></p><p class="eliseo"><?php echo CHtml::encode($model->email); ?></p>
				<p><strong>Institution:</strong></p><p class="eliseo"><?php echo CHtml::encode($model->profile->institution); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns grisos profiler">
				<?php echo CHtml::link('<i class="foundicon-tools sear" >Edit Profile</i>', Yii::app()->getModule('user')->profileUrl, array('class' => 'small button secondary radius right entrar')); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent() ?>