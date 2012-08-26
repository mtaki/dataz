<?php
$this->breadcrumbs=array(
	'Statistics Telecom Mains'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StatisticsTelecomMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsTelecomMain', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('statistics-telecom-main-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Telecom Statistics</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'statistics-telecom-main-grid',
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
<?php echo CHtml::Button('Add New Record',array('submit'=>Yii::app()->controller->createUrl('create')));?>