<?php
$this->breadcrumbs=array(
	'Vsat Antenna Datas'=>array('index'),
	$model->application_vsat_id=>array('view','id'=>$model->application_vsat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VsatAntennaData', 'url'=>array('index')),
	array('label'=>'Create VsatAntennaData', 'url'=>array('create')),
	array('label'=>'View VsatAntennaData', 'url'=>array('view', 'id'=>$model->application_vsat_id)),
	array('label'=>'Manage VsatAntennaData', 'url'=>array('admin')),
);
?>

<h1>Update VsatAntennaData <?php echo $model->application_vsat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>