<?php
$this->breadcrumbs=array(
	'Numbering Applications',
);

$this->menu=array(
	array('label'=>'Create NumberingApplication', 'url'=>array('create')),
	array('label'=>'Manage NumberingApplication', 'url'=>array('admin')),
);
?>

<h1>Numbering Applications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
