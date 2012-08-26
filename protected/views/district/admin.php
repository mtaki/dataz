<?php
$this->breadcrumbs=array(
	'Districts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List District', 'url'=>array('index')),
	array('label'=>'Create District', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('district-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Districts</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'district-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'region.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->controller->createUrl('create')));?>