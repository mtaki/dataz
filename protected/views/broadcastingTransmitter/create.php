<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitter', 'url'=>array('index')),
	array('label'=>'Manage BroadcastingTransmitter', 'url'=>array('admin')),
);
?>

<h1>Create BroadcastingTransmitter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>