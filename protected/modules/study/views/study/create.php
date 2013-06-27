<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/home_nav'); ?>
<div class="row">
	<div class="large-8 large-centered columns blanko elogin">
		<div class="row bluerer masabajo">
			<div class="large-12 columns">
				<h4>Study details:</h4>
			</div>
		</div>
		<?php echo $this->renderPartial('_form', array('model' => $model, 'roles' => $roles)); ?>
	</div>
</div>
<?php $this->endContent() ?>