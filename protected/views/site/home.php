<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/home_studies'); ?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
?>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
	</div>
<?php endif; ?>
<div class="row">
	<div class="large-6 columns">
		<div class="large-11 large-centered columns studyblock">
			<div class="row firstinfo grisos">
				<div class="small-6 columns"><p>Role: Admin</p></div>
				<div class="small-6 columns text-right"><p><em>id:453</em></p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns"><p class="eliseo studyname">Medication Administration in the ICU</p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns"><p class="studydesc">
						<i class="foundicon-location"></i> 2 sites<br/>
						<i class="foundicon-address-book"></i> 9 observers<br/>
						<i class="foundicon-website"></i> 16 tasks
						<br/>
						<i class="foundicon-inbox"></i> 55 observations<br/>
						<i class="foundicon-clock"></i> 40h 02m 27s</p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns">
					<a href="#" class="button success radius right entrar">Access Study</a>
				</div>
			</div>
			<div class="row lastinfo">
				<div class="small-6 columns"><p>By <strong>Poyinyen</strong></p></div>
				<div class="small-6 columns text-right"><p><em>Nov 3, 2013</em></p></div>
			</div>
		</div>
	</div>
	<div class="large-6 columns">
		<div class="large-11 large-centered columns studyblock">
			<div class="row firstinfo grisos">
				<div class="small-6 columns"><p>Role: Observer</p></div>
				<div class="small-6 columns text-right"><p><em>id:221</em></p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns"><p class="eliseo studyname">Interruptions in the Emergency Department</p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns"><p class="studydesc">
						<i class="foundicon-location"></i> 1 site<br/>
						<i class="foundicon-address-book"></i> 2 observers<br/>
						<i class="foundicon-website"></i> 4 tasks
						<br/>
						<i class="foundicon-inbox"></i> 23 observations<br/>
						<i class="foundicon-clock"></i> 2h 30m 13s</p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns">
					<a href="#" class="button success radius right entrar">Access Study</a>
				</div>
			</div>
			<div class="row lastinfo">
				<div class="small-6 columns"><p>By <strong>Chelop</strong></p></div>
				<div class="small-6 columns text-right"><p><em>March 2, 2013</em></p></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="large-6 columns">
		<div class="large-11 large-centered columns studyblock">
			<div class="row firstinfo grisos">
				<div class="small-6 columns"><p>Role: Admin</p></div>
				<div class="small-6 columns text-right"><p><em>id:65</em></p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns"><p class="eliseo studyname">Med-surg General Workflow Study</p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns"><p class="studydesc ">
						<i class="foundicon-location"></i> 3 sites<br/>
						<i class="foundicon-address-book"></i> 10 observers<br/>
						<i class="foundicon-website"></i> 15 tasks
						<br/>
						<i class="foundicon-inbox"></i> 87 observations<br/>
						<i class="foundicon-clock"></i> 22h 15m 33s</p></div>
			</div>
			<div class="row blanko">
				<div class="small-12 columns">
					<a href="#" class="button success radius right entrar">Access Study</a>
				</div>
			</div>
			<div class="row lastinfo">
				<div class="small-6 columns"><p>By <strong>Poyinyen</strong></p></div>
				<div class="small-6 columns text-right"><p><em>Jan 15, 2013</em></p></div>
			</div>
		</div>
	</div>

</div>
</div>
<div class="large-2 columns">
	<div class="row">
		<h3>New Study</h3>
	</div>
	<div class="row">
		<a href="#" class="button expand"><i class="foundicon-plus sear" ></i> Create New Study</a>
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
			<p><strong>Institution:</strong></p><p class="eliseo">The Ohio State University</p>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns grisos profiler">
			<?php echo CHtml::link('<i class="foundicon-tools sear" >Edit Profile</i>', Yii::app()->getModule('user')->profileUrl, array('class'=>'small button secondary radius right entrar')); ?>
		</div>
	</div>
</div>
<?php echo CHtml::link('Change Password', 'recovery/changepassword') ?>
<table>
	<tr>
		<th class=""><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
		<td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<?php
	$profileFields = ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach ($profileFields as $field) {
			//echo "<pre>"; print_r($profile); die();
			?>
			<tr>
				<th class=""><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
				<td><?php echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname)))); ?></td>

			</tr>
			<?php
		}//$profile->getAttribute($field->varname)
	}
	?>
	<tr>
		<th class=""><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
		<td><?php echo $model->create_at; ?></td>
	</tr>
</table>
<?php $this->endContent() ?>