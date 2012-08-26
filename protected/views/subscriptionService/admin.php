<?php
$this->breadcrumbs=array(
	'Subscription Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SubscriptionService', 'url'=>array('index')),
	array('label'=>'Create SubscriptionService', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('subscription-service-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Subscription Services</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subscription-service-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->createUrl('subscriptionService/create')));?>