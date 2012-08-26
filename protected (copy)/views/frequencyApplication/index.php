<?php
$this->breadcrumbs=array(
	'Frequency Applications',
);

$this->menu=array(
	array('label'=>'Create FrequencyApplication', 'url'=>array('create')),
	array('label'=>'Manage FrequencyApplication', 'url'=>array('admin')),
);
?>

<h1>Frequency Applications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
