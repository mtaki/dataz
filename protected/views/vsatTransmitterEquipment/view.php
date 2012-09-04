<?php
$this->breadcrumbs=array(
	'Vsat Transmitter Equipments'=>array('index'),
	$model->application_vsat_id,
);

$this->menu=array(
	array('label'=>'List VsatTransmitterEquipment', 'url'=>array('index')),
	array('label'=>'Create VsatTransmitterEquipment', 'url'=>array('create')),
	array('label'=>'Update VsatTransmitterEquipment', 'url'=>array('update', 'id'=>$model->application_vsat_id)),
	array('label'=>'Delete VsatTransmitterEquipment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->application_vsat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VsatTransmitterEquipment', 'url'=>array('admin')),
);
?>

<h1>View VsatTransmitterEquipment #<?php echo $model->application_vsat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'application_vsat_id',
		'TCRAID',
		'type_approval_number',
		'manufacture_name',
		'model',
		'serial_number',
		'transmitter_power',
		'effective_radiated_power',
		'equipment_manual_attached',
		'station_class',
		'remark',
	),
)); ?>
