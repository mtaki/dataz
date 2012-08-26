<?php
$this->breadcrumbs=array(
	'Air Time Movements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AirTimeMovement', 'url'=>array('index')),
	array('label'=>'Create AirTimeMovement', 'url'=>array('create')),
	array('label'=>'Update AirTimeMovement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AirTimeMovement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AirTimeMovement', 'url'=>array('admin')),
);
?>

<h1>View Air Time Movement</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
<?php echo CHtml::Button('List',array('submit'=>Yii::app()->createUrl('airTimeMovement/admin')));?>
