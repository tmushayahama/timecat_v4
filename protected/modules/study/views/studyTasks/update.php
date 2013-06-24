<?php
/* @var $this StudyTasksController */
/* @var $model StudyTasks */

$this->breadcrumbs=array(
	'Study Tasks'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudyTasks', 'url'=>array('index')),
	array('label'=>'Create StudyTasks', 'url'=>array('create')),
	array('label'=>'View StudyTasks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StudyTasks', 'url'=>array('admin')),
);
?>

<h1>Update StudyTasks <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>