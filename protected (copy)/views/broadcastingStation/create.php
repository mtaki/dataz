<?php
$this->breadcrumbs=array(
	'Broadcasting Stations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BroadcastingStation', 'url'=>array('index')),
	array('label'=>'Manage BroadcastingStation', 'url'=>array('admin')),
);
?>

<h1>Create BroadcastingStation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>