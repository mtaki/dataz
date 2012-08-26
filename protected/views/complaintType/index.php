<?php
$this->breadcrumbs=array(
	'Complaint Types',
);

$this->menu=array(
	array('label'=>'Create ComplaintType', 'url'=>array('create')),
	array('label'=>'Manage ComplaintType', 'url'=>array('admin')),
);
?>

<h1>Complaint Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
