<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('complaint-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Complaints</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'complaint-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'complainant.name:raw:Complainant',
		'description',
		'relief',
		'verification_comp_date:raw:Date',
		'region.name:raw:Region',
		'sector.name:raw:Sector',
		'status',
		array(
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("View"), $data->getViewUrl())'
		),
	),
)); ?>
