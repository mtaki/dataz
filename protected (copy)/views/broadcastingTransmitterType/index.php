<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitter Types',
);

$this->menu=array(
	array('label'=>'Create BroadcastingTransmitterType', 'url'=>array('create')),
	array('label'=>'Manage BroadcastingTransmitterType', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Transmitter Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
