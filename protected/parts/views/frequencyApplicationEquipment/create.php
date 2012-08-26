<?php
$this->breadcrumbs=array(
	'Frequency Application Equipments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationEquipment', 'url'=>array('index')),
	array('label'=>'Manage FrequencyApplicationEquipment', 'url'=>array('admin')),
);
?>

<h1>Create FrequencyApplicationEquipment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>