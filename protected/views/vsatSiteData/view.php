<?php
$this->breadcrumbs=array(
	'Vsat Site Datas'=>array('index'),
	$model->application_vsat_id,
);

$this->menu=array(
	array('label'=>'List VsatSiteData', 'url'=>array('index')),
	array('label'=>'Create VsatSiteData', 'url'=>array('create')),
	array('label'=>'Update VsatSiteData', 'url'=>array('update', 'id'=>$model->application_vsat_id)),
	array('label'=>'Delete VsatSiteData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->application_vsat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VsatSiteData', 'url'=>array('admin')),
);
?>

<h1>View VsatSiteData #<?php echo $model->application_vsat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'site_number',
		'site_name',
		'location_place_name',
		'log_deg',
		'log_min',
		'log_secs',
		'lat_deg',
		'lat_min',
		'lat_secs',
		'region',
		'site_elevation',
		'remark',
		'application_vsat_id',
	),
)); ?>
