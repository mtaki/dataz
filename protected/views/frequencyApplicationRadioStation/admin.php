<?php
$this->breadcrumbs=array(
	'Frequency Application Radio Stations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationRadioStation', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationRadioStation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-application-radio-station-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Frequency Application Radio Stations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frequency-application-radio-station-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'application_id',
		'index',
		'exact_antenna_site',
		'location',
		'make',
		/*
		'call_sign',
		'antenna_type',
		'longitude',
		'latitude',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
