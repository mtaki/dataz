<?php
$this->breadcrumbs=array(
	'Frequency Fee Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FrequencyFeeType', 'url'=>array('index')),
	array('label'=>'Create FrequencyFeeType', 'url'=>array('create')),
	array('label'=>'Update FrequencyFeeType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyFeeType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyFeeType', 'url'=>array('admin')),
);
?>

<h1>View FrequencyFeeType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'application_type_id',
		'name',
	),
)); ?>
