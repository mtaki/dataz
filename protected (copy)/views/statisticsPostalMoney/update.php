<?php
$this->breadcrumbs=array(
	'Statistics Postal Moneys'=>array('index'),
	$model->main_id=>array('view','id'=>$model->Array),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMoney', 'url'=>array('index')),
	array('label'=>'Create StatisticsPostalMoney', 'url'=>array('create')),
	array('label'=>'View StatisticsPostalMoney', 'url'=>array('view', 'id'=>$model->Array)),
	array('label'=>'Manage StatisticsPostalMoney', 'url'=>array('admin')),
);
?>

<h1>Update StatisticsPostalMoney <?php echo $model->Array; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>