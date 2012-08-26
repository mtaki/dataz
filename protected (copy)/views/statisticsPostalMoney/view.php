<?php
$this->breadcrumbs=array(
	'Statistics Postal Moneys'=>array('index'),
	$model->main_id,
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMoney', 'url'=>array('index')),
	array('label'=>'Create StatisticsPostalMoney', 'url'=>array('create')),
	array('label'=>'Update StatisticsPostalMoney', 'url'=>array('update', 'id'=>$model->Array)),
	array('label'=>'Delete StatisticsPostalMoney', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Array),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatisticsPostalMoney', 'url'=>array('admin')),
);
?>

<h1>View StatisticsPostalMoney #<?php echo $model->Array; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'main_id',
		'service_id',
		'customers',
		'amount',
	),
)); ?>
