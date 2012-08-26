<?php
$this->breadcrumbs=array(
	'Frequency Station Sub Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FrequencyStationSubType', 'url'=>array('index')),
	array('label'=>'Create FrequencyStationSubType', 'url'=>array('create')),
	array('label'=>'Update FrequencyStationSubType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyStationSubType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyStationSubType', 'url'=>array('admin')),
);
?>

<h1>View FrequencyStationSubType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'station_type_id',
		'fee',
		'fee_currency',
		'formula',
		'grouped',
	),
)); ?>
