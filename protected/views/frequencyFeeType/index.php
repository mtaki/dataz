<?php
$this->breadcrumbs=array(
	'Frequency Fee Types',
);

$this->menu=array(
	array('label'=>'Create FrequencyFeeType', 'url'=>array('create')),
	array('label'=>'Manage FrequencyFeeType', 'url'=>array('admin')),
);
?>

<h1>Frequency Fee Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
