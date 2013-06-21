<?php
/* @var $this ObservationsController */
/* @var $model Observations */

$this->breadcrumbs=array(
	'Observations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Observations', 'url'=>array('index')),
	array('label'=>'Create Observations', 'url'=>array('create')),
	array('label'=>'Update Observations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Observations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Observations', 'url'=>array('admin')),
);
?>

<h1>View Observations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'start_time',
		'duration',
		'user_id',
		'subject_id',
		'site_id',
		'type_id',
		'valid',
	),
)); ?>
