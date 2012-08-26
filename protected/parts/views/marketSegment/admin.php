<?php
$this->breadcrumbs=array(
	'Market Segments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MarketSegment', 'url'=>array('index')),
	array('label'=>'Create MarketSegment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('market-segment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Market Segments</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Add',array('submit'=>Yii::app()->controller->createUrl('create')));?></td>
</tr>
</table>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'market-segment-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'licenceCategory.name',
		array(               // related city displayed as a link
			'name'=>'Category',
			'type'=>'raw',
			'value'=>'($data->licence_sub_category_id)?$data->licenceSubCategory->name:""',
		),
		array(               // related city displayed as a link
			'name'=>'Market Segment',
			'type'=>'raw',
			'value'=>'$data->name',
		),
		
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
