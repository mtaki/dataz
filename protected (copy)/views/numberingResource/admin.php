<?php
$this->breadcrumbs=array(
	'Numbering Resources'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NumberingResource', 'url'=>array('index')),
	array('label'=>'Create NumberingResource', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('numbering-resource-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Numbering Resources</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'numbering-resource-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		
		'num:raw:Number/Code',
		'applicant.name:raw:Operator',
		'numberingResourceType.name:raw:Type',
		
		array(
			'type'=>'raw',
			'value'=>'empty($data->assignment_date)?"":date("d-m-Y",strtotime($data->assignment_date))',
			'name'=>'Assignment Date',
		),
		'status',
		/*
		'application_id',
		'request_type',
		*/
		
	),
)); ?>
