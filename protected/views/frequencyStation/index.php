<?php
$this->breadcrumbs=array(
	'Frequency Stations',
);

$this->menu=array(
	array('label'=>'Create FrequencyStation', 'url'=>array('create')),
	array('label'=>'Manage FrequencyStation', 'url'=>array('admin')),
);
?>

<h1>Frequency Stations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
