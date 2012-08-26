<?php
$this->breadcrumbs=array(
	'Subscription Services'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubscriptionService', 'url'=>array('index')),
	array('label'=>'Create SubscriptionService', 'url'=>array('create')),
	array('label'=>'View SubscriptionService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubscriptionService', 'url'=>array('admin')),
);
?>

<h1>Update Subscription Service</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>