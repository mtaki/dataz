<?php
$this->breadcrumbs=array(
	'Statistics Internet Mains'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatisticsInternetMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsInternetMain', 'url'=>array('create')),
	array('label'=>'View StatisticsInternetMain', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatisticsInternetMain', 'url'=>array('admin')),
);
?>

<h1>Internet Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>