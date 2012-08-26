<?php
$this->breadcrumbs=array(
	'Frequency Station Sub Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyStationSubType', 'url'=>array('index')),
	array('label'=>'Create FrequencyStationSubType', 'url'=>array('create')),
	array('label'=>'View FrequencyStationSubType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyStationSubType', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyStationSubType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>