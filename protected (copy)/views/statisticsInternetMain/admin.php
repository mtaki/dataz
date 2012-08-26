<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('statistics-internet-main-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Internet Statistics</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'statistics-internet-main-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'operator.name',
		'st_year',
		array(
			'header'=>'Month',
			'type'=>'raw',
			'value'=>'date("M", mktime(0, 0, 0, $data->st_month))'
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}&nbsp;{delete}',
		),
	),
)); ?>
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->controller->createUrl('create')));?>