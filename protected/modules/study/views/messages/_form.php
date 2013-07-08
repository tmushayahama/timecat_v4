<?php
/* @var $this MessagesController */
/* @var $messagesModel Messages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($messagesModel); ?>

        <div class="row">
		<?php echo $form->labelEx($userMessagesModel,'email'); ?>
		<?php echo $form->textField($userMessagesModel,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($userMessagesModel,'email'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($messagesModel,'subject'); ?>
		<?php echo $form->textField($messagesModel,'subject',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($messagesModel,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($messagesModel,'body'); ?>
		<?php echo $form->textField($messagesModel,'body',array('size'=>60,'maxlength'=>1028)); ?>
		<?php echo $form->error($messagesModel,'body'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($messagesModel->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->