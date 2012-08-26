<?php
$this->breadcrumbs=array(
	'Frequency Application Links',
);

$this->menu=array(
	array('label'=>'Create FrequencyApplicationLink', 'url'=>array('create')),
	array('label'=>'Manage FrequencyApplicationLink', 'url'=>array('admin')),
);
?>

<h1>Frequency Application Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
