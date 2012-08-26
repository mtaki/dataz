<?php
$this->breadcrumbs=array(
	'Frequency Application Equipments',
);

$this->menu=array(
	array('label'=>'Create FrequencyApplicationEquipment', 'url'=>array('create')),
	array('label'=>'Manage FrequencyApplicationEquipment', 'url'=>array('admin')),
);
?>

<h1>Frequency Application Equipments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
