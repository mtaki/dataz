<?php
$this->breadcrumbs=array(
	'Numbering Resource Types',
);

$this->menu=array(
	array('label'=>'Create NumberingResourceType', 'url'=>array('create')),
	array('label'=>'Manage NumberingResourceType', 'url'=>array('admin')),
);
?>

<h1>Numbering Resource Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
