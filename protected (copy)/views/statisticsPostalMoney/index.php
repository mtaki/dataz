<?php
$this->breadcrumbs=array(
	'Statistics Postal Moneys',
);

$this->menu=array(
	array('label'=>'Create StatisticsPostalMoney', 'url'=>array('create')),
	array('label'=>'Manage StatisticsPostalMoney', 'url'=>array('admin')),
);
?>

<h1>Statistics Postal Moneys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
