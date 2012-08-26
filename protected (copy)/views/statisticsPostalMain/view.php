<?php
$this->breadcrumbs=array(
	'Statistics Postal Mains'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsPostalMain', 'url'=>array('create')),
	array('label'=>'Update StatisticsPostalMain', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatisticsPostalMain', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatisticsPostalMain', 'url'=>array('admin')),
);
?>

<h1>View Postal Statistics</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'operator_id',
		'st_year',
		'st_month',
	),
)); ?>
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->controller->createUrl('create')));?> <?php echo CHtml::Button('List',array('submit'=>Yii::app()->controller->createUrl('admin')));?>