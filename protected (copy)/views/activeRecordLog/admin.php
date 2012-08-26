<?php
$this->breadcrumbs=array(
	'Active Record Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ActiveRecordLog', 'url'=>array('index')),
	array('label'=>'Create ActiveRecordLog', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('active-record-log-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>View Action Logs</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'active-record-log-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'description',
		'action',
		'table',
		'table_id',
		'creationdate',
		
		'username',
		/*
		'old_values',
		'new_values',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
