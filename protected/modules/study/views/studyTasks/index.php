<?php
/* @var $this StudyTasksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Study Tasks',
);

$this->menu=array(
	array('label'=>'Create StudyTasks', 'url'=>array('create')),
	array('label'=>'Manage StudyTasks', 'url'=>array('admin')),
);
?>

<h1>Study Tasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
