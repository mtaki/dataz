<?php
$this->breadcrumbs=array(
	'Report Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ReportGroup', 'url'=>array('index')),
	array('label'=>'Create ReportGroup', 'url'=>array('create')),
	array('label'=>'Update ReportGroup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReportGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReportGroup', 'url'=>array('admin')),
);
?>

<h1>View ReportGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
