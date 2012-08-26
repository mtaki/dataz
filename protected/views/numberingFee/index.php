<?php
$this->breadcrumbs=array(
	'Numbering Fees',
);

$this->menu=array(
	array('label'=>'Create NumberingFee', 'url'=>array('create')),
	array('label'=>'Manage NumberingFee', 'url'=>array('admin')),
);
?>

<h1>Numbering Fees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
