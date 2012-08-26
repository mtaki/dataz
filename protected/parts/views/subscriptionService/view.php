<?php
$this->breadcrumbs=array(
	'Subscription Services'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SubscriptionService', 'url'=>array('index')),
	array('label'=>'Create SubscriptionService', 'url'=>array('create')),
	array('label'=>'Update SubscriptionService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubscriptionService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubscriptionService', 'url'=>array('admin')),
);
?>

<h1>View Subscription Service</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
<?php echo CHtml::Button('List',array('submit'=>Yii::app()->createUrl('subscriptionService/admin')));?>