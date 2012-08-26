<?php
$this->breadcrumbs=array(
	'Licence Applications',
);

$this->menu=array(
	array('label'=>'Create LicenceApplication', 'url'=>array('create')),
	array('label'=>'Manage LicenceApplication', 'url'=>array('admin')),
);
?>

<h1>Licence Applications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
