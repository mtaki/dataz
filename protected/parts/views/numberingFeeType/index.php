<?php
$this->breadcrumbs=array(
	'Numbering Fee Types',
);

$this->menu=array(
	array('label'=>'Create NumberingFeeType', 'url'=>array('create')),
	array('label'=>'Manage NumberingFeeType', 'url'=>array('admin')),
);
?>

<h1>Numbering Fee Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
