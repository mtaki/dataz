<?php
$this->breadcrumbs=array(
	'Citizenships'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Citizenship', 'url'=>array('index')),
	array('label'=>'Create Citizenship', 'url'=>array('create')),
	array('label'=>'Update Citizenship', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Citizenship', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Citizenship', 'url'=>array('admin')),
);
?>

<h1>View Citizenship <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
<?php echo CHtml::Button('Go to List',array('submit'=>Yii::app()->controller->createUrl('admin')));?>