<?php
$this->breadcrumbs=array(
	'Frequency Station Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FrequencyStationType', 'url'=>array('index')),
	array('label'=>'Create FrequencyStationType', 'url'=>array('create')),
	array('label'=>'Update FrequencyStationType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyStationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyStationType', 'url'=>array('admin')),
);
?>

<h1>View FrequencyStationType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
