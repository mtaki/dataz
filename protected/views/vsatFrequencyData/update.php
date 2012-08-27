<?php
$this->breadcrumbs=array(
	'Vsat Frequency Datas'=>array('index'),
	$model->application_vsat_id=>array('view','id'=>$model->application_vsat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VsatFrequencyData', 'url'=>array('index')),
	array('label'=>'Create VsatFrequencyData', 'url'=>array('create')),
	array('label'=>'View VsatFrequencyData', 'url'=>array('view', 'id'=>$model->application_vsat_id)),
	array('label'=>'Manage VsatFrequencyData', 'url'=>array('admin')),
);
?>

<h1>Update VsatFrequencyData <?php echo $model->application_vsat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>