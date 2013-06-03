<?php
/* @var $this AvatarController */
/* @var $model Avatar */

$this->breadcrumbs=array(
	'Avatars'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Avatar', 'url'=>array('index')),
	array('label'=>'Create Avatar', 'url'=>array('create')),
	array('label'=>'View Avatar', 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>'Manage Avatar', 'url'=>array('admin')),
);
?>

<h1>Update Avatar <?php echo $model->user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>