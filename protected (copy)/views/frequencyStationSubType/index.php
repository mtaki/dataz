<?php
$this->breadcrumbs=array(
	'Frequency Station Sub Types',
);

$this->menu=array(
	array('label'=>'Create FrequencyStationSubType', 'url'=>array('create')),
	array('label'=>'Manage FrequencyStationSubType', 'url'=>array('admin')),
);
?>

<h1>Frequency Station Sub Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
