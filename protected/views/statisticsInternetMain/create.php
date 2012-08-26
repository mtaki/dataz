<?php
$this->breadcrumbs=array(
	'Statistics Internet Mains'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatisticsInternetMain', 'url'=>array('index')),
	array('label'=>'Manage StatisticsInternetMain', 'url'=>array('admin')),
);
?>

<h1>Internet Statistics</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>