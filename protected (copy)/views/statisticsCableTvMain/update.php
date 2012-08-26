<?php
$this->breadcrumbs=array(
	'Statistics Cable Tv Mains'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatisticsCableTvMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsCableTvMain', 'url'=>array('create')),
	array('label'=>'View StatisticsCableTvMain', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatisticsCableTvMain', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>