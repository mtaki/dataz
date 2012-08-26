<?php
$this->breadcrumbs=array(
	'Statistics Cable Tv Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatisticsCableTvMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsCableTvMain', 'url'=>array('create')),
	array('label'=>'Update StatisticsCableTvMain', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatisticsCableTvMain', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatisticsCableTvMain', 'url'=>array('admin')),
);
?>

<h1>View Broadcasting Statistics </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'operator_id',
		'st_year',
		'st_month',
	),
)); ?>
