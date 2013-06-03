<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
// ...
echo $form->labelEx($model, 'image');
echo $form->fileField($model, 'image');
echo $form->error($model, 'image');
// ...
       
$this->endWidget(); ?>

<?php echo CHtml::beginForm('','post',array
('enctype'=>'multipart/form-data'))?>
<?php echo CHtml::error($model, 'image_url')?>
<?php echo CHtml::activeFileField($model, 'image_url')?>
<?php echo CHtml::submitButton('Profile')?>
<?php echo CHtml::endForm()?> 
