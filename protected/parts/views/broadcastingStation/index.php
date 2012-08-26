<?php
$this->breadcrumbs=array(
	'Broadcasting Stations',
);

$this->menu=array(
	array('label'=>'Create BroadcastingStation', 'url'=>array('create')),
	array('label'=>'Manage BroadcastingStation', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Stations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
