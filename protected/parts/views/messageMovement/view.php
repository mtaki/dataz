<?php
$this->breadcrumbs=array(
	'Message Movements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MessageMovement', 'url'=>array('index')),
	array('label'=>'Create MessageMovement', 'url'=>array('create')),
	array('label'=>'Update MessageMovement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MessageMovement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MessageMovement', 'url'=>array('admin')),
);
?>

<h1>View Message Movement</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
<?php echo CHtml::Button('List',array('submit'=>Yii::app()->createUrl('messageMovement/admin')));?>