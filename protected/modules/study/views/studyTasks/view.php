<?php
/* @var $this StudyTasksController */
/* @var $model StudyTasks */

$this->breadcrumbs=array(
	'Study Tasks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List StudyTasks', 'url'=>array('index')),
	array('label'=>'Create StudyTasks', 'url'=>array('create')),
	array('label'=>'Update StudyTasks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StudyTasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudyTasks', 'url'=>array('admin')),
);
?>

<h1>View StudyTasks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'study_id',
		'category_id',
		'start_action',
		'end_action',
		'definition',
		'status',
	),
)); ?>
