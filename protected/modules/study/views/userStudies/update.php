<?php
/* @var $this UserStudiesController */
/* @var $model UserStudies */

$this->breadcrumbs=array(
	'User Studies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserStudies', 'url'=>array('index')),
	array('label'=>'Create UserStudies', 'url'=>array('create')),
	array('label'=>'View UserStudies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserStudies', 'url'=>array('admin')),
);
?>

<h1>Update UserStudies <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>