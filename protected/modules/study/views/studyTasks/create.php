<?php
/* @var $this StudyTasksController */
/* @var $model StudyTasks */

$this->breadcrumbs=array(
	'Study Tasks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudyTasks', 'url'=>array('index')),
	array('label'=>'Manage StudyTasks', 'url'=>array('admin')),
);
?>

<h1>Create StudyTasks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>