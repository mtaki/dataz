<?php
$this->breadcrumbs=array(
	'Relief Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ReliefType', 'url'=>array('index')),
	array('label'=>'Create ReliefType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('relief-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Relief Types</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'relief-type-grid',
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
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->createUrl('reliefType/create')));?>