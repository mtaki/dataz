<?php
$this->breadcrumbs=array(
	'Numbering Fee Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NumberingFeeType', 'url'=>array('index')),
	array('label'=>'Create NumberingFeeType', 'url'=>array('create')),
	array('label'=>'Update NumberingFeeType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NumberingFeeType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NumberingFeeType', 'url'=>array('admin')),
);
?>

<h1>View NumberingFeeType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'numbering_resource_type_id',
	),
)); ?>
