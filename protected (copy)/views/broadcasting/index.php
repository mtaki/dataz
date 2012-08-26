<?php
$this->breadcrumbs=array(
	'Frequencys',
);

$this->menu=array(
	array('label'=>'Create Frequency', 'url'=>array('create')),
	array('label'=>'Manage Frequency', 'url'=>array('admin')),
);
?>

<h1>Frequencys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
