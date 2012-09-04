<?php
$this->breadcrumbs=array(
	'Vsat Frequency Datas'=>array('index'),
	$model->application_vsat_id,
);

$this->menu=array(
	array('label'=>'List VsatFrequencyData', 'url'=>array('index')),
	array('label'=>'Create VsatFrequencyData', 'url'=>array('create')),
	array('label'=>'Update VsatFrequencyData', 'url'=>array('update', 'id'=>$model->application_vsat_id)),
	array('label'=>'Delete VsatFrequencyData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->application_vsat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VsatFrequencyData', 'url'=>array('admin')),
);
?>

<h1>View VsatFrequencyData #<?php echo $model->application_vsat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'frequency_band',
		'date_of_issue',
		'date_of_renewal',
		'emission',
		'tolerance',
		'application_vsat_id',
	),
)); ?>
