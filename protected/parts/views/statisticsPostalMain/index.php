<?php
$this->breadcrumbs=array(
	'Statistics Postal Mains',
);

$this->menu=array(
	array('label'=>'Create StatisticsPostalMain', 'url'=>array('create')),
	array('label'=>'Manage StatisticsPostalMain', 'url'=>array('admin')),
);
?>

<h1>Statistics Postal Mains</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
