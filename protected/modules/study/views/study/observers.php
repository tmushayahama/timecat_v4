<?php $this->beginContent('//home_layouts/study_layouts/study_main_2'); ?>

			<?php
			$form = $this->beginWidget('CActiveForm', array(
					'id' => 'tasks-form',
					'enableAjaxValidation' => false,
			));
			?>
			
				<?php echo $form->textField($observer, 'email', array('maxlength' => 255)); ?>
				<?php echo $form->error($observer, 'email'); ?>
			
				<?php echo CHtml::tag('button', array('class' => 'small button radius entrar'), '<i class="foundicon-plus"></i> Add');
				?>
		
			<?php $this->endWidget(); ?>
    
<?php $this->endContent(); ?>
