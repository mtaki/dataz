<?php
$this->breadcrumbs=array(
	'Numbering Resources',
);

$this->menu=array(
	array('label'=>'Create NumberingResource', 'url'=>array('create')),
	array('label'=>'Manage NumberingResource', 'url'=>array('admin')),
);
?>

<h1>Numbering Resources</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
