<?php
$this->breadcrumbs=array(
	'Frequency Types',
);

$this->menu=array(
	array('label'=>'Create FrequencyType', 'url'=>array('create')),
	array('label'=>'Manage FrequencyType', 'url'=>array('admin')),
);
?>

<h1>Frequency Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
