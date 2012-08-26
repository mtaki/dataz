<?php
$this->breadcrumbs=array(
	'Other Fees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OtherFee', 'url'=>array('index')),
	array('label'=>'Create OtherFee', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('other-fee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Other Fees</h1>
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
	'id'=>'other-fee-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'code',
		'fee',
		'feeCurrency.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
