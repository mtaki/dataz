<?php
$this->breadcrumbs=array(
	'Frequency Application Links'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationLink', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationLink', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-application-link-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Frequency Application Links</h1>

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
	'id'=>'frequency-application-link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'frequency_application_id',
		'station_a_name',
		'station_b_name',
		'station_a_longitude',
		'station_a_latitude',
		/*
		'station_b_longitude',
		'station_b_latitude',
		'station_a_antenna_size',
		'station_b_antenna_size',
		'station_a_agl',
		'station_b_agl',
		'station_a_asl',
		'station_b_asl',
		'length',
		'station_a_antenna_type',
		'station_b_antenna_type',
		'station_a_antenna_gain',
		'station_b_antenna_gain',
		'station_a_power',
		'station_b_power',
		'station_a_effective_power',
		'station_b_effective_power',
		'station_a_beam_width',
		'station_b_beam_width',
		'station_a_polarization',
		'station_b_polarization',
		'station_a_azimuth',
		'station_b_azimuth',
		'station_a_channel_spacing',
		'station_b_channel_spacing',
		'station_a_tr_separation',
		'station_b_tr_separation',
		'station_a_tr_capacity',
		'station_b_tr_capacity',
		'station_a_channels',
		'station_b_channels',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
