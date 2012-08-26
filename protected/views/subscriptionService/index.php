<?php
$this->breadcrumbs=array(
	'Subscription Services',
);

$this->menu=array(
	array('label'=>'Create SubscriptionService', 'url'=>array('create')),
	array('label'=>'Manage SubscriptionService', 'url'=>array('admin')),
);
?>

<h1>Subscription Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
