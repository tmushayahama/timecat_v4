<?php
/* @var $this StudyController */
/* @var $model Study */

$this->breadcrumbs=array(
	'Studies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Study', 'url'=>array('index')),
	array('label'=>'Create Study', 'url'=>array('create')),
	array('label'=>'View Study', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Study', 'url'=>array('admin')),
);
?>

<h1>Update Study <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>