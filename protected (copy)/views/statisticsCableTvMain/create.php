<?php
$this->breadcrumbs=array(
	'Statistics Cable Tv Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatisticsCableTvMain', 'url'=>array('index')),
	array('label'=>'Manage StatisticsCableTvMain', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>