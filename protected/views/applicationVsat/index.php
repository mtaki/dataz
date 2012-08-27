<?php
$this->breadcrumbs=array(
	'Application Vsats',
);

$this->menu=array(
	array('label'=>'Create ApplicationVsat', 'url'=>array('create')),
	array('label'=>'Manage ApplicationVsat', 'url'=>array('admin')),
);
?>

<h1>Application Vsats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
