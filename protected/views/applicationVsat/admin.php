<?php
$this->breadcrumbs=array(
	'Application Vsats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ApplicationVsat', 'url'=>array('index')),
	array('label'=>'Create ApplicationVsat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('application-vsat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Application Vsats</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-vsat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'file_number',
		'classification',
		'status_1',
		'status_2',
		'status_3',
		/*
		'status_4',
		'status_date_1',
		'status_date_2',
		'status_date_3',
		'status_date_4',
		'application_type_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
