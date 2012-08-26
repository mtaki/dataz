<?php
$this->breadcrumbs=array(
	'Statistics Telecom Mains',
);

$this->menu=array(
	array('label'=>'Create StatisticsTelecomMain', 'url'=>array('create')),
	array('label'=>'Manage StatisticsTelecomMain', 'url'=>array('admin')),
);
?>

<h1>Statistics Telecom Mains</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
