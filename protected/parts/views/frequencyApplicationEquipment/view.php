<?php
$this->breadcrumbs=array(
	'Frequency Application Equipments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationEquipment', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationEquipment', 'url'=>array('create')),
	array('label'=>'Update FrequencyApplicationEquipment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyApplicationEquipment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyApplicationEquipment', 'url'=>array('admin')),
);
?>

<h1>View FrequencyApplicationEquipment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'application_id',
		'type_service',
		'type_radio',
		'model',
		'power',
	),
)); ?>
