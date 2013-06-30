<?php
/* @var $this UserStudiesController */
/* @var $model UserStudies */

$this->breadcrumbs=array(
	'User Studies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserStudies', 'url'=>array('index')),
	array('label'=>'Create UserStudies', 'url'=>array('create')),
	array('label'=>'Update UserStudies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserStudies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserStudies', 'url'=>array('admin')),
);
?>

<h1>View UserStudies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'study_id',
		'role_id',
		'pending_request',
	),
)); ?>
