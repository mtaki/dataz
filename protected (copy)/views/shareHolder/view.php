<?php
$this->breadcrumbs=array(
	'Share Holders'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ShareHolder', 'url'=>array('index')),
	array('label'=>'Create ShareHolder', 'url'=>array('create')),
	array('label'=>'Update ShareHolder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ShareHolder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShareHolder', 'url'=>array('admin')),
);
?>

<h1>View ShareHolder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'operator_id',
		'citizenship_id',
		'share_percentage',
		'phone',
		'address',
		'email',
		'share_number',
	),
)); ?>
