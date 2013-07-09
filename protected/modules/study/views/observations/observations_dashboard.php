<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
	<li><a href="onsestudy.html">Study Home</a></li>
	<li class="current"><a href="observers.html">Observers</a></li>
</ul>	
<div class="row">
	<div class="large-7 columns">
		<?php foreach ($study_observations as $observations): ?>
			<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear">	
					<div class="row">
						<div class="small-12 columns firstinfo grisos">
							<div class="small-6 columns"><p>By First Last</p></div>
							<div class="small-6 columns text-right"><p><em>Type: Training</em></p></div>
						</div>
						<div class="small-2 columns topad">
							<img class="left" src="/timecat_v4/images/timecat_avatar.gif" alt="avatar" />
						</div>
						<div class="small-10 columns">
							<div class="row minpad">
								<div class="large-12 columns">
									<span><em>id: <?php echo $observations->id ?></em></span>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<i class="foundicon-idea"></i> Start Time  <em><?php echo $observations->start_time ?></em><br/>
										<i class="foundicon-checkmark"></i> Site: <?php echo $observations->site->name ?>
									</p>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<i class="foundicon-flag"></i> End Time <em>(22h08m14s)</em><br/>
										<i class="foundicon-location"></i> Observed: <?php echo $observations->site->name ?>
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="row celeste">
						<div class="small-12 columns">
							<a href="obs_detail.html" class="button small secondary nomarg">View details</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="large-5 columns">
		<div class="row">
			<div class="large-11 large-centered columns blanko ">
				<div class="row bluerer">
					<div class="large-12 columns">
						<h5>New Observation</h5>
					</div>
				</div>
				<?php
				$form = $this->beginWidget('CActiveForm', array(
						'id' => 'observations-form',
						'enableAjaxValidation' => false,
				));
				?>
				<?php echo CHtml::errorSummary($observations_model); ?>
				<div class="row">
					<div class="large-9 large-centered columns celeste inputers">
						<div class="row">
							<div class="large-3 columns">
								<?php echo $form->labelEx($observations_model, 'observer'); ?>
							</div>
							<div class="large-9 columns">
								<?php echo $form->textField($observations_model, 'observer', array('readonly'=>'true', 'value'=>Yii::app()->user->email, 'maxlength' => 50)); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="large-9 large-centered columns celeste inputers">
						<div class="row">
							<div class="large-3 columns">
								<?php echo $form->labelEx($observations_model, 'site_id'); ?>
							</div>
							<div class="large-9 columns">
								<?php echo $form->dropDownList($observations_model, 'site_id', CHtml::listData($observations_sites, 'id', 'name'), array('id' => 'edit-observationscategory-field')); ?>
								<?php echo $form->error($observations_model, 'site_id'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="large-9 large-centered columns celeste inputers">
						<div class="row">
							<div class="large-3 columns">
								<?php echo $form->labelEx($observations_model, 'subjectDescription'); ?>
							</div>
							<div class="large-9 columns">
								<?php echo $form->textArea($observations_model, 'subjectDescription', array('id' => 'edit-observationsdefinition-field', 'maxlength' => 255)); ?>
								<?php echo $form->error($observations_model, 'subjectDescription'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns text-right">
						<?php
						echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Save Changes');
						?>
					</div>
				</div>
				<?php $this->endWidget(); ?>		
			</div>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>
