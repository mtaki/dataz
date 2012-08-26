<?php
$this->breadcrumbs=array(
	'Frequency Application Links'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationLink', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationLink', 'url'=>array('create')),
	array('label'=>'Update FrequencyApplicationLink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyApplicationLink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyApplicationLink', 'url'=>array('admin')),
);
?>

<h1>View FrequencyApplicationLink #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'frequency_application_id',
		'station_a_name',
		'station_b_name',
		'station_a_longitude',
		'station_a_latitude',
		'station_b_longitude',
		'station_b_latitude',
		'station_a_antenna_size',
		'station_b_antenna_size',
		'station_a_agl',
		'station_b_agl',
		'station_a_asl',
		'station_b_asl',
		'length',
		'station_a_antenna_type',
		'station_b_antenna_type',
		'station_a_antenna_gain',
		'station_b_antenna_gain',
		'station_a_power',
		'station_b_power',
		'station_a_effective_power',
		'station_b_effective_power',
		'station_a_beam_width',
		'station_b_beam_width',
		'station_a_polarization',
		'station_b_polarization',
		'station_a_azimuth',
		'station_b_azimuth',
		'station_a_channel_spacing',
		'station_b_channel_spacing',
		'station_a_tr_separation',
		'station_b_tr_separation',
		'station_a_tr_capacity',
		'station_b_tr_capacity',
		'station_a_channels',
		'station_b_channels',
	),
)); ?>
