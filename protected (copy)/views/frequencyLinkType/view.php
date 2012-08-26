<?php
$this->breadcrumbs=array(
	'Frequency Link Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FrequencyLinkType', 'url'=>array('index')),
	array('label'=>'Create FrequencyLinkType', 'url'=>array('create')),
	array('label'=>'Update FrequencyLinkType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyLinkType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyLinkType', 'url'=>array('admin')),
);
?>

<h1>View FrequencyLinkType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'fee',
		'currency_id',
	),
)); ?>
