<?php
$this->breadcrumbs=array(
	'Licence Sub Categories',
);

$this->menu=array(
	array('label'=>'Create LicenceSubCategory', 'url'=>array('create')),
	array('label'=>'Manage LicenceSubCategory', 'url'=>array('admin')),
);
?>

<h1>Licence Sub Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
