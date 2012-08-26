<?php
$this->breadcrumbs=array(
	'Statistics Postal Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMain', 'url'=>array('index')),
	array('label'=>'Manage StatisticsPostalMain', 'url'=>array('admin')),
);
?>

<h1>Postal Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
