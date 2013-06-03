<?php
/* @var $this AvatarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Avatars',
);

$this->menu=array(
	array('label'=>'Create Avatar', 'url'=>array('create')),
	array('label'=>'Manage Avatar', 'url'=>array('admin')),
);
?>

<h1>Avatars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
