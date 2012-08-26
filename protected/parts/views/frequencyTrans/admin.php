<?php
$this->breadcrumbs=array(
	'Frequency Trans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FrequencyTrans', 'url'=>array('index')),
	array('label'=>'Create FrequencyTrans', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-trans-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Transmission System/Technology</h1>
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
	'id'=>'frequency-trans-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'name',
		'frequencyType.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
