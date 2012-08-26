<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitter', 'url'=>array('index')),
	array('label'=>'Create BroadcastingTransmitter', 'url'=>array('create')),
	array('label'=>'Update BroadcastingTransmitter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BroadcastingTransmitter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BroadcastingTransmitter', 'url'=>array('admin')),
);
?>

<h1>View Broadcasting Transmitter</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'operator.name',
		'transmitterType.code',
		'num',
		'description',
	),
)); ?>
