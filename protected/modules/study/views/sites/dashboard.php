<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
	<li><a href="onsestudy.html">Study Home</a></li>
	<li class="current"><a href="sites.html">Sites</a></li>
</ul>	
<div class="row">
	<div class="large-7 columns">
		<?php foreach ($study_sites as $site): ?>
			<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear">
					<div class="row minpad">
						<div class="large-12 columns stid" data-stid="1">
							<span class="vnam"><?php echo $site->name ?></span>
							<span class="round success label right">active</span>
						</div>
					</div>
					<div class="row">
						<div class="small-10 columns">
							<div class="row minpad">
								<div class="large-3 columns">
									<strong>Time-Zone:</strong>
								</div>
								<div class="large-9 columns vdef" data-thetmz="America/Anchorage">
									<?php echo $site->timezone; ?>
								</div>
							</div>
							<div class="row minpad">
								<div class="large-3 columns">
									<strong>Current Time:</strong>
								</div>
								<div class="large-9 columns vstars">
									18:25
								</div>
							</div>
						</div>
						<div class="small-2 columns">
							<img src="<?php echo Yii::app()->request->baseUrl . '/img/site1.png'?>" alt="site icon" />
						</div>
					</div>
					<div class="row celeste">
						<div class="small-12 columns">
							<a href="#" class="button small secondary nomarg editers">Edit</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="large-5 columns">
		<?php
		echo $this->renderPartial('_form', array('sites_model' => $sites_model,
				'sites_timezones' => $sites_timezones));
		?>
	</div>
</div>
<div id="edit-sites-modal" class="reveal-modal medium">
	<h2>Edit Site.</h2>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'sites-form',
			'enableAjaxValidation' => false,
	));
	?>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($sites_model, 'name'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textField($sites_model, 'name', array('id' => 'edit-sitesname-field', 'maxlength' => 50)); ?>
					<?php echo $form->error($sites_model, 'name'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($sites_model, 'timezone'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->dropDownList($sites_model, 'timezone', CHtml::listData($sites_timezones, 'name', 'name')); //$sites_types); ?>
					<?php echo $form->error($sites_model, 'timezone'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-9 large-centered columns celeste inputers">
			<div class="row">
				<div class="large-3 columns">
					<?php echo $form->labelEx($sites_model, 'description'); ?>
				</div>
				<div class="large-9 columns">
					<?php echo $form->textArea($sites_model, 'description', array('id' => 'edit-sitesdescription-field', 'maxlength' => 255)); ?>
					<?php echo $form->error($sites_model, 'description'); ?>
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
