<?php
$this->breadcrumbs=array(
	'Report Groups',
);

$this->menu=array(
	array('label'=>'Create ReportGroup', 'url'=>array('create')),
	array('label'=>'Manage ReportGroup', 'url'=>array('admin')),
);
?>

<h1>Report Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
