<?php
/* @var $this AvatarController */
/* @var $model Avatar */

$this->breadcrumbs=array(
	'Avatars'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>'List Avatar', 'url'=>array('index')),
	array('label'=>'Create Avatar', 'url'=>array('create')),
	array('label'=>'Update Avatar', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete Avatar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Avatar', 'url'=>array('admin')),
);
?>

<h1>View Avatar #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'lastname',
		'firstname',
		'avatar_url',
	),
)); ?>
