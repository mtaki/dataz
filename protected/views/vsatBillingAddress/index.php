<?php
$this->breadcrumbs=array(
	'Vsat Billing Addresses',
);

$this->menu=array(
	array('label'=>'Create VsatBillingAddress', 'url'=>array('create')),
	array('label'=>'Manage VsatBillingAddress', 'url'=>array('admin')),
);
?>

<h1>Vsat Billing Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
