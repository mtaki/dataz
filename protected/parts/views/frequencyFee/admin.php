<?php
$this->breadcrumbs=array(
	'Frequency Fees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FrequencyFee', 'url'=>array('index')),
	array('label'=>'Create FrequencyFee', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-fee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Frequency Fees</h1>
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
	'id'=>'frequency-fee-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'id',
		'band',
		'description',
		'fee',
		'feeCurrency.name',
		'duration',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
