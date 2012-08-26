<?php
$this->breadcrumbs=array(
	'Frequency Application Equipments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationEquipment', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationEquipment', 'url'=>array('create')),
	array('label'=>'View FrequencyApplicationEquipment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyApplicationEquipment', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyApplicationEquipment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>