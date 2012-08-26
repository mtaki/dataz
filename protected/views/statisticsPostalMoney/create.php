<?php
$this->breadcrumbs=array(
	'Statistics Postal Moneys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMoney', 'url'=>array('index')),
	array('label'=>'Manage StatisticsPostalMoney', 'url'=>array('admin')),
);
?>

<h1>Create StatisticsPostalMoney</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>