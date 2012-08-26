<?php
$this->breadcrumbs=array(
	'Broadcasting Stations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BroadcastingStation', 'url'=>array('index')),
	array('label'=>'Create BroadcastingStation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('broadcasting-station-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Broadcasting Stations</h1>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'broadcasting-station-grid',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		'operator_id',
		'name',
		'region_id',
		'district_id',
		'station_type_id',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
