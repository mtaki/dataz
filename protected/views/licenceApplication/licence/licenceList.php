<?php
/*$this->breadcrumbs=array(
	'Licence Applications'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Create LicenceApplication', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('licence-application-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$mytitle='Manage Licence Applications';
if (Yii::app()->controller->action->id=='annualFeeList'){
			$mytitle='Licence Annual Fee';
		}
?>
<h1><?php echo $mytitle;?></h1>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" ">
<?php $this->renderPartial('licence/_licenceSearch',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'licence-application-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'applicant.name:raw:Operator','num:raw:Licence Number','licenceCategory.name',
		array(
			'name'=>'Market Segments',
			'type'=>'raw',
			'value'=>'$data->getMarketSegments()',
		),
		'issue_date','duration:raw:Duration in years',
		array('type'=>'raw','header'=>'Annual fee','value'=>'$data->annualFee()'),
		array(
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("View"), $data->getViewUrl())'
		),
	),
	
));

//'template'=>"{items}\n{summary}\n{pager}",
?>
