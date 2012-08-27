<?php
$this->breadcrumbs=array(
	'Vsat Transmitter Equipments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VsatTransmitterEquipment', 'url'=>array('index')),
	array('label'=>'Manage VsatTransmitterEquipment', 'url'=>array('admin')),
);
?>

<h1>Create VsatTransmitterEquipment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>