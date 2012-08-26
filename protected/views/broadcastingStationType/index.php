<?php
$this->breadcrumbs=array(
	'Broadcasting Station Types',
);

$this->menu=array(
	array('label'=>'Create BroadcastingStationType', 'url'=>array('create')),
	array('label'=>'Manage BroadcastingStationType', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Station Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
