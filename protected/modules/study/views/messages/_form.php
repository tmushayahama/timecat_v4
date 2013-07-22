<?php
/* @var $this MessagesController */
/* @var $model Messages */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'messages-form',
        'enableAjaxValidation' => false,
    ));
    ?>


    <!--header from the 'Add new Site' form-->
    <div class="row bluerer">
        <div class="large-12 columns">
            <h5>Create new message</h5>
        </div>
    </div>
    
    

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'subject'); ?>
        <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'subject'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'body'); ?>
        <?php echo $form->textField($model, 'body', array('size' => 60, 'maxlength' => 1028)); ?>
        <?php echo $form->error($model, 'body'); ?>
    </div>

    <div class="row buttons">
        <?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::tag('button', array('class' => 'button'), 'Send'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->