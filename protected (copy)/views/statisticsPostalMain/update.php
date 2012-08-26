<?php
$this->breadcrumbs=array(
	'Statistics Postal Mains'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsPostalMain', 'url'=>array('create')),
	array('label'=>'View StatisticsPostalMain', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatisticsPostalMain', 'url'=>array('admin')),
);
?>

<h1>Update Postal Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>