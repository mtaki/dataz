<?php
$this->breadcrumbs=array(
	'Air Time Movements',
);

$this->menu=array(
	array('label'=>'Create AirTimeMovement', 'url'=>array('create')),
	array('label'=>'Manage AirTimeMovement', 'url'=>array('admin')),
);
?>

<h1>Air Time Movements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
