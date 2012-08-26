<?php
$this->breadcrumbs=array(
	'Share Holders',
);

$this->menu=array(
	array('label'=>'Create ShareHolder', 'url'=>array('create')),
	array('label'=>'Manage ShareHolder', 'url'=>array('admin')),
);
?>

<h1>Share Holders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
