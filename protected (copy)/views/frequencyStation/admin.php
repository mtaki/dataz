<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('frequency-station-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Stations</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Add',array('submit'=>Yii::app()->controller->createUrl('new')));?></td>
</tr>
</table>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frequency-station-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'operator.name',
		'frequencyStationtype.name:raw:Type',
		'licence_date',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
