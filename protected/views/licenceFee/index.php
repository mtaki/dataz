<?php
$this->breadcrumbs=array(
	'Licence Fees',
);

$this->menu=array(
	array('label'=>'Create LicenceFee', 'url'=>array('create')),
	array('label'=>'Manage LicenceFee', 'url'=>array('admin')),
);
?>

<h1>Licence Fees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
