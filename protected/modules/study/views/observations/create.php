<?php
/* @var $this ObservationsController */
/* @var $model Observations */

$this->breadcrumbs=array(
	'Observations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Observations', 'url'=>array('index')),
	array('label'=>'Manage Observations', 'url'=>array('admin')),
);
?>

<h1>Create Observations</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>