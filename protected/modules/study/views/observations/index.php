<?php
/* @var $this ObservationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Observations',
);

$this->menu=array(
	array('label'=>'Create Observations', 'url'=>array('create')),
	array('label'=>'Manage Observations', 'url'=>array('admin')),
);
?>

<h1>Observations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
