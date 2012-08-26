<?php
$this->breadcrumbs=array(
	'Message Movements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MessageMovement', 'url'=>array('index')),
	array('label'=>'Create MessageMovement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('message-movement-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Message Movements</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'message-movement-grid',
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
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->createUrl('messageMovement/create')));?>