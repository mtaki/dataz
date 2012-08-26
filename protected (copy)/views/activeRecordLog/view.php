<?php
$this->breadcrumbs=array(
	'Active Record Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ActiveRecordLog', 'url'=>array('index')),
	array('label'=>'Create ActiveRecordLog', 'url'=>array('create')),
	array('label'=>'Update ActiveRecordLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ActiveRecordLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ActiveRecordLog', 'url'=>array('admin')),
);
?>

<h1>View Action Log</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'action',
		'table',
		'table_id',
		array('label'=>'Log Time','value'=>date('d-m-Y H:i:s',strtotime($model->creationdate))),
		'username',
		array('label'=>'Old Values','value'=>str_replace(',',' , ',$model->old_values)),
		array('label'=>'New Values','value'=>str_replace(',',' , ',$model->new_values)),
		
	),
)); ?>
<?php 

?>
<?php echo CHtml::Button('Go to List',array('submit'=>Yii::app()->controller->createUrl('admin')));?>