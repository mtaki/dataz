<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitter', 'url'=>array('index')),
	array('label'=>'Create BroadcastingTransmitter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('broadcasting-transmitter-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Broadcasting Transmitters</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'broadcasting-transmitter-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'operator.name',
		'transmitterType.code',
		'num',
		'description',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
