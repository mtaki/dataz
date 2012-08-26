<?php
$this->breadcrumbs=array(
	'Frequency Links',
);

$this->menu=array(
	array('label'=>'Create FrequencyLink', 'url'=>array('create')),
	array('label'=>'Manage FrequencyLink', 'url'=>array('admin')),
);
?>

<h1>Frequency Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
