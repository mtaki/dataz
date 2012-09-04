<?php
$this->breadcrumbs=array(
	'Application Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ApplicationType', 'url'=>array('index')),
	array('label'=>'Create ApplicationType', 'url'=>array('create')),
	array('label'=>'Update ApplicationType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ApplicationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApplicationType', 'url'=>array('admin')),
);
?>

<h1>View ApplicationType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type_name',
	),
)); ?>
