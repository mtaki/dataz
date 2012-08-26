<?php
$this->breadcrumbs=array(
	'Statistics Postal Mains'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StatisticsPostalMain', 'url'=>array('index')),
	array('label'=>'Create StatisticsPostalMain', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('statistics-postal-main-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Postal Statistics</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'statistics-postal-main-grid',
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