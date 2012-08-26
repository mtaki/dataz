<?php
$this->breadcrumbs=array(
	'Relief Types',
);

$this->menu=array(
	array('label'=>'Create ReliefType', 'url'=>array('create')),
	array('label'=>'Manage ReliefType', 'url'=>array('admin')),
);
?>

<h1>Relief Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
