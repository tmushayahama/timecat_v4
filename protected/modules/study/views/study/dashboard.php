<?php $this->beginContent('//home_layouts/study_layouts/study_main_2'); ?>

<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Begin New Obversation</i>', '/timecat_v4/study/observations/dashboard/studyid/'.$model->id, array('class' => 'button expand')); ?>	
	</div>
</div>
<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Tasks</i>', '/timecat_v4/study/tasks/dashboard/studyid/'.$model->id, array('class' => 'button expand')); ?>	
	</div>
</div>
<div class="large-2 columns">
	<div class="row">
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Observers</i>', '/timecat_v4/study/study/observers/studyid/'.$model->id, array('class' => 'button expand')); ?>	
	</div>
</div>
<div class="large-2 columns">
	<div class="row">
		
		<?php echo CHtml::link('<i class="foundicon-plus sear" >Sites</i>', '/timecat_v4/study/sites/dashboard/studyid/'.$model->id, array('class' => 'button expand')); ?>	
	</div>
</div>

<?php $this->endContent(); ?>
