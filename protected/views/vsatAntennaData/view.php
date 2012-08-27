<?php
$this->breadcrumbs=array(
	'Vsat Antenna Datas'=>array('index'),
	$model->application_vsat_id,
);

$this->menu=array(
	array('label'=>'List VsatAntennaData', 'url'=>array('index')),
	array('label'=>'Create VsatAntennaData', 'url'=>array('create')),
	array('label'=>'Update VsatAntennaData', 'url'=>array('update', 'id'=>$model->application_vsat_id)),
	array('label'=>'Delete VsatAntennaData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->application_vsat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VsatAntennaData', 'url'=>array('admin')),
);
?>

<h1>View VsatAntennaData #<?php echo $model->application_vsat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TCRAID',
		'manufacture_name',
		'model',
		'height_above_ground',
		'polarization',
		'directional',
		'circular',
		'other',
		'application_vsat_id',
	),
)); ?>
