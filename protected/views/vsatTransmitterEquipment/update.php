<?php
$this->breadcrumbs=array(
	'Vsat Transmitter Equipments'=>array('index'),
	$model->application_vsat_id=>array('view','id'=>$model->application_vsat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VsatTransmitterEquipment', 'url'=>array('index')),
	array('label'=>'Create VsatTransmitterEquipment', 'url'=>array('create')),
	array('label'=>'View VsatTransmitterEquipment', 'url'=>array('view', 'id'=>$model->application_vsat_id)),
	array('label'=>'Manage VsatTransmitterEquipment', 'url'=>array('admin')),
);
?>

<h1>Update VsatTransmitterEquipment <?php echo $model->application_vsat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>