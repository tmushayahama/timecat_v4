<?php $this->beginContent('//home_layouts/study_layouts/study_main'); ?>

<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Begin New Obversation</i>', 'study/study/create', array('class' => 'button expand')); ?>	
	</div>
</div>
<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Tasks</i>', 'study/study/create', array('class' => 'button expand')); ?>	
	</div>
</div>
<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Observers</i>', 'study/study/create', array('class' => 'button expand')); ?>	
	</div>
</div>
<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Sites</i>', 'study/study/create', array('class' => 'button expand')); ?>	
	</div>
</div>
<?php $this->endContent(); ?>
