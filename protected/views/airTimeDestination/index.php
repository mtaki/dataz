<?php
$this->breadcrumbs=array(
	'Air Time Destinations',
);

$this->menu=array(
	array('label'=>'Create AirTimeDestination', 'url'=>array('create')),
	array('label'=>'Manage AirTimeDestination', 'url'=>array('admin')),
);
?>

<h1>Air Time Destinations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
