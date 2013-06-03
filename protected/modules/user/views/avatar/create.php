<?php
/* @var $this AvatarController */
/* @var $model Avatar */

$this->breadcrumbs=array(
	'Avatars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Avatar', 'url'=>array('index')),
	array('label'=>'Manage Avatar', 'url'=>array('admin')),
);
?>

<h1>Create Avatar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>