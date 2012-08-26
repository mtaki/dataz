<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Frequencies</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frequency-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'operator.name',
		'frequencyType.name',
		array(
			'name'=>'Frequency',
			'value'=>'$data->getFrequencyView()',
		),
		'total_band_width:raw:Total band width in MHz',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
