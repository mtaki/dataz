<?php
$this->breadcrumbs=array(
	'Frequency Fees',
);

$this->menu=array(
	array('label'=>'Create FrequencyFee', 'url'=>array('create')),
	array('label'=>'Manage FrequencyFee', 'url'=>array('admin')),
);
?>

<h1>Frequency Fees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
