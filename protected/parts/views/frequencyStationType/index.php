<?php
$this->breadcrumbs=array(
	'Frequency Station Types',
);

$this->menu=array(
	array('label'=>'Create FrequencyStationType', 'url'=>array('create')),
	array('label'=>'Manage FrequencyStationType', 'url'=>array('admin')),
);
?>

<h1>Frequency Station Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
