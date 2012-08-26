<?php
$this->breadcrumbs=array(
	'Numbering Resource Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NumberingResourceType', 'url'=>array('index')),
	array('label'=>'Create NumberingResourceType', 'url'=>array('create')),
	array('label'=>'Update NumberingResourceType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NumberingResourceType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NumberingResourceType', 'url'=>array('admin')),
);
?>

<h1>View NumberingResourceType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
