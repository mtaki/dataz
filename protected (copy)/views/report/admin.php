<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Report', 'url'=>array('index')),
	array('label'=>'Create Report', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('report-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Generate Reports</h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
 

if ((Yii::app()->controller->action->id!='admin')){
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'report-grid',
		'dataProvider'=>$model->search(),
		//'filter'=>$model,
		'columns'=>array(
			
			'name',
			array(
				'type'=>'raw',
				'value'=>'CHtml::link(CHtml::encode("View"), Yii::app()->createUrl("report/generate",array("id"=>$data->id)))'
			),
		),
	)); 
}else{
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'report-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		
		'name',
		
		array('class'=>'CButtonColumn',),
	),
));

}
?>
<?php if ((Yii::app()->controller->action->id=='admin')) echo CHtml::Button('Create Report',array('submit'=>Yii::app()->createUrl('report/create')));?>
