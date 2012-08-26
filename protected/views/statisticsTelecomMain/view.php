<?php
$this->breadcrumbs=array(
	'Statistics Telecom Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatisticsTelecomMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsTelecomMain', 'url'=>array('create')),
	array('label'=>'Update StatisticsTelecomMain', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatisticsTelecomMain', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatisticsTelecomMain', 'url'=>array('admin')),
);
?>

<h1>View Telecom Statistics</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'operator_id',
		'st_year',
		'st_month',
	),
)); ?>
