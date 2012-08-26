<?php
$this->breadcrumbs=array(
	'Other Fees',
);

$this->menu=array(
	array('label'=>'Create OtherFee', 'url'=>array('create')),
	array('label'=>'Manage OtherFee', 'url'=>array('admin')),
);
?>

<h1>Other Fees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
