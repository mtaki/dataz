<?php
$this->breadcrumbs=array(
	'Statistics Employment Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatisticsEmploymentMain', 'url'=>array('index')),
	array('label'=>'Manage StatisticsEmploymentMain', 'url'=>array('admin')),
);
?>

<h1>Create StatisticsEmploymentMain</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>