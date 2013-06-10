<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/create_study'); ?>

<?php
/* @var $this StudyController */
/* @var $model Study */

$this->breadcrumbs=array(
	'Studies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Study', 'url'=>array('index')),
	array('label'=>'Manage Study', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'roles'=>$roles)); ?>
<?php $this->endContent() ?>