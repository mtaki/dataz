<?php
$this->breadcrumbs=array(
	'Subscription Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubscriptionService', 'url'=>array('index')),
	array('label'=>'Manage SubscriptionService', 'url'=>array('admin')),
);
?>

<h1>Create Subscription Service</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>