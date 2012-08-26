<?php
$this->breadcrumbs=array(
	'Broadcasting Stations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BroadcastingStation', 'url'=>array('index')),
	array('label'=>'Create BroadcastingStation', 'url'=>array('create')),
	array('label'=>'Update BroadcastingStation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BroadcastingStation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BroadcastingStation', 'url'=>array('admin')),
);
?>

<h1>View Broadcasting Station</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'operator.name',
		'name',
		'region.name',
		'district_id',
		'stationType.name',
		
	),
)); ?>
