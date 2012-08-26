<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitter Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitterType', 'url'=>array('index')),
	array('label'=>'Create BroadcastingTransmitterType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('broadcasting-transmitter-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Transmitter Types</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Add',array('submit'=>Yii::app()->controller->createUrl('create')));?></td>
</tr>
</table>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'broadcasting-transmitter-type-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'code',
		'description',
		'annual_fee',
		'annualCurrency.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
