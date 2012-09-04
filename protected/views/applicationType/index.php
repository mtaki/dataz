<?php
$this->breadcrumbs=array(
	'Application Types',
);

$this->menu=array(
	array('label'=>'Create ApplicationType', 'url'=>array('create')),
	array('label'=>'Manage ApplicationType', 'url'=>array('admin')),
);
?>

<h1>Application Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
