<?php
$this->breadcrumbs=array(
	'Complaint Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ComplaintType', 'url'=>array('index')),
	array('label'=>'Create ComplaintType', 'url'=>array('create')),
	array('label'=>'Update ComplaintType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ComplaintType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ComplaintType', 'url'=>array('admin')),
);
?>

<h1>View Complaint Type</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
<?php echo CHtml::Button('List',array('submit'=>Yii::app()->createUrl('complaintType/admin')));?>