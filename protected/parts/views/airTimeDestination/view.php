<?php
$this->breadcrumbs=array(
	'Air Time Destinations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AirTimeDestination', 'url'=>array('index')),
	array('label'=>'Create AirTimeDestination', 'url'=>array('create')),
	array('label'=>'Update AirTimeDestination', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AirTimeDestination', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AirTimeDestination', 'url'=>array('admin')),
);
?>

<h1>View Air Time Destination</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
<?php echo CHtml::Button('List',array('submit'=>Yii::app()->createUrl('airTimeDestination/admin')));?>