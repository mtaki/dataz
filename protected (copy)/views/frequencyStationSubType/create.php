<?php
$this->breadcrumbs=array(
	'Frequency Station Sub Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyStationSubType', 'url'=>array('index')),
	array('label'=>'Manage FrequencyStationSubType', 'url'=>array('admin')),
);
?>

<h1>Create FrequencyStationSubType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>