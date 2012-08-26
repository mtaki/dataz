<?php
$this->breadcrumbs=array(
	'Complaint Parties',
);

$this->menu=array(
	array('label'=>'Create ComplaintParty', 'url'=>array('create')),
	array('label'=>'Manage ComplaintParty', 'url'=>array('admin')),
);
?>

<h1>Complaint Parties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
