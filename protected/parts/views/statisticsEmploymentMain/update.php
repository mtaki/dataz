<?php
$this->breadcrumbs=array(
	'Statistics Employment Mains'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatisticsEmploymentMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsEmploymentMain', 'url'=>array('create')),
	array('label'=>'View StatisticsEmploymentMain', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatisticsEmploymentMain', 'url'=>array('admin')),
);
?>

<h1>Employment Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>