<?php
$this->breadcrumbs=array(
	'Frequency Links'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FrequencyLink', 'url'=>array('index')),
	array('label'=>'Create FrequencyLink', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-link-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Frequency Links</h1>
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
	'id'=>'frequency-link-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'operator.name',
		'frequencyLinkType.name',
		'num',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
