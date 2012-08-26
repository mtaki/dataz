<?php
$this->breadcrumbs=array(
	'Complaint Parties'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ComplaintParty', 'url'=>array('index')),
	array('label'=>'Create ComplaintParty', 'url'=>array('create')),
	array('label'=>'Update ComplaintParty', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ComplaintParty', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ComplaintParty', 'url'=>array('admin')),
);
?>

<h1>View ComplaintParty #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'occupation',
		'mobile',
		'telephone',
		'email',
	),
)); ?>
