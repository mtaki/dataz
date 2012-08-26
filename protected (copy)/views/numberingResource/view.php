<?php
$this->breadcrumbs=array(
	'Numbering Resources'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NumberingResource', 'url'=>array('index')),
	array('label'=>'Create NumberingResource', 'url'=>array('create')),
	array('label'=>'Update NumberingResource', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NumberingResource', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NumberingResource', 'url'=>array('admin')),
);
?>

<h1>View NumberingResource #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'num',
		'operator_id',
		'numbering_resource_type_id',
		'status',
		'numbering_fee_type_id',
		'application_id',
		'request_type',
	),
)); ?>
