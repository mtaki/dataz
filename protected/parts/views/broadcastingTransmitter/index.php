<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitters',
);

$this->menu=array(
	array('label'=>'Create BroadcastingTransmitter', 'url'=>array('create')),
	array('label'=>'Manage BroadcastingTransmitter', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Transmitters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
