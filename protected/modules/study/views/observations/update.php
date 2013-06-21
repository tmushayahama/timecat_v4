<?php
/* @var $this ObservationsController */
/* @var $model Observations */

$this->breadcrumbs=array(
	'Observations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Observations', 'url'=>array('index')),
	array('label'=>'Create Observations', 'url'=>array('create')),
	array('label'=>'View Observations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Observations', 'url'=>array('admin')),
);
?>

<h1>Update Observations <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>