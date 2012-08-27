<?php
$this->breadcrumbs=array(
	'Vsat Transmitter Equipments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VsatTransmitterEquipment', 'url'=>array('index')),
	array('label'=>'Create VsatTransmitterEquipment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vsat-transmitter-equipment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vsat Transmitter Equipments</h1>

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
	'id'=>'vsat-transmitter-equipment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'application_vsat_id',
		'TCRAID',
		'type_approval_number',
		'manufacture_name',
		'model',
		'serial_number',
		/*
		'transmitter_power',
		'effective_radiated_power',
		'equipment_manual_attached',
		'station_class',
		'remark',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
