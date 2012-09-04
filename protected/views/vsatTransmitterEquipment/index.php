<?php
$this->breadcrumbs=array(
	'Vsat Transmitter Equipments',
);

$this->menu=array(
	array('label'=>'Create VsatTransmitterEquipment', 'url'=>array('create')),
	array('label'=>'Manage VsatTransmitterEquipment', 'url'=>array('admin')),
);
?>

<h1>Vsat Transmitter Equipments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
