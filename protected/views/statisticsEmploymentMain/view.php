<?php
$this->breadcrumbs=array(
	'Statistics Employment Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatisticsEmploymentMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsEmploymentMain', 'url'=>array('create')),
	array('label'=>'Update StatisticsEmploymentMain', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatisticsEmploymentMain', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatisticsEmploymentMain', 'url'=>array('admin')),
);
?>

<h1>View StatisticsEmploymentMain #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'operator_id',
		'st_year',
	),
)); ?>
