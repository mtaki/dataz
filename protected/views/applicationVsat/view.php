<?php
$this->breadcrumbs=array(
	'Application Vsats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ApplicationVsat', 'url'=>array('index')),
	array('label'=>'Create ApplicationVsat', 'url'=>array('create')),
	array('label'=>'Update ApplicationVsat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ApplicationVsat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApplicationVsat', 'url'=>array('admin')),
);
?>

<h1>View ApplicationVsat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'file_number',
		'classification',
		'status_1',
		'status_2',
		'status_3',
		'status_4',
		'status_date_1',
		'status_date_2',
		'status_date_3',
		'status_date_4',
		'application_type_id',
	),
)); ?>
