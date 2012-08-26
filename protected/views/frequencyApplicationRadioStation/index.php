<?php
$this->breadcrumbs=array(
	'Frequency Application Radio Stations',
);

$this->menu=array(
	array('label'=>'Create FrequencyApplicationRadioStation', 'url'=>array('create')),
	array('label'=>'Manage FrequencyApplicationRadioStation', 'url'=>array('admin')),
);
?>

<h1>Frequency Application Radio Stations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
