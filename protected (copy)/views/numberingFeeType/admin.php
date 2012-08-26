<?php
$this->breadcrumbs=array(
	'Numbering Fee Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NumberingFeeType', 'url'=>array('index')),
	array('label'=>'Create NumberingFeeType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('numbering-fee-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Fee Types</h1>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'numbering-fee-type-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'name',
		'numbering_resource_type_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
