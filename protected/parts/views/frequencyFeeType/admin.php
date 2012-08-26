<?php
$this->breadcrumbs=array(
	'Frequency Fee Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FrequencyFeeType', 'url'=>array('index')),
	array('label'=>'Create FrequencyFeeType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-fee-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Frequency Fee Types</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frequency-fee-type-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'application_type_id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
