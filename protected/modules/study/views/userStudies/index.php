<?php
/* @var $this UserStudiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Studies',
);

$this->menu=array(
	array('label'=>'Create UserStudies', 'url'=>array('create')),
	array('label'=>'Manage UserStudies', 'url'=>array('admin')),
);
?>

<h1>User Studies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
