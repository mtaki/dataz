<?php
$this->breadcrumbs=array(
	'Frequency Application Radio Stations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationRadioStation', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationRadioStation', 'url'=>array('create')),
	array('label'=>'Update FrequencyApplicationRadioStation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyApplicationRadioStation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyApplicationRadioStation', 'url'=>array('admin')),
);
?>

<h1>View FrequencyApplicationRadioStation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'application_id',
		'index',
		'exact_antenna_site',
		'location',
		'make',
		'call_sign',
		'antenna_type',
		'longitude',
		'latitude',
	),
)); ?>
