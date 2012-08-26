<?php
$this->breadcrumbs=array(
	'Message Movements',
);

$this->menu=array(
	array('label'=>'Create MessageMovement', 'url'=>array('create')),
	array('label'=>'Manage MessageMovement', 'url'=>array('admin')),
);
?>

<h1>Message Movements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
