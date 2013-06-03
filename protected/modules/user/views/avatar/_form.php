<?php
/* @var $this AvatarController */
/* @var $model Avatar */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'avatar-form',
            'enableAjaxValidation'=>false,
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
            ),
    )); ?>

	<p class="note">Choose Your Timecat Avatar </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar_url'); ?>
		<?php echo CHtml::activeFileField($model,'avatar_url',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'avatar_url'); ?>
	</div>

        <?php if($model->isNewRecord!='1') ?>
        <div class="row">
        <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->avatar_url, "avatar_url",array("width"=>200)); ?>  
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->