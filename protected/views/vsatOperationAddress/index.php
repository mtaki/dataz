<?php
$this->breadcrumbs=array(
	'Vsat Operation Addresses',
);

$this->menu=array(
	array('label'=>'Create VsatOperationAddress', 'url'=>array('create')),
	array('label'=>'Manage VsatOperationAddress', 'url'=>array('admin')),
);
?>

<h1>Vsat Operation Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
