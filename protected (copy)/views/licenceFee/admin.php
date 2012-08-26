<?php
$this->breadcrumbs=array(
	'Licence Fees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LicenceFee', 'url'=>array('index')),
	array('label'=>'Create LicenceFee', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('licence-fee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Licence Fees</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Add',array('submit'=>Yii::app()->controller->createUrl('create')));?></td>
</tr>
</table>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'licence-fee-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'licenceCategory.name',
		array('htmlOptions'=>array('style'=>'width:30px'),'header'=>'Market Segment','value'=>'($data->marketSegment->licence_sub_category_id)?$data->marketSegment->licenceSubCategory->name." - ".$data->marketSegment->name:$data->marketSegment->name'),
		array('htmlOptions'=>array('style'=>'text-align:right'),'header'=>'Application Fee','value'=>'number_format($data->application_fee,2)." ".Currency::model()->findByPk($data->application_fee_currency_id)->name'),
		array('htmlOptions'=>array('style'=>'text-align:right'),'header'=>'Initial Fee','value'=>'number_format($data->initial_fee,2)." ".Currency::model()->findByPk($data->initial_fee_currency_id)->name'),
		array('htmlOptions'=>array('style'=>'text-align:right'),'header'=>'Annual Fee','value'=>'($data->annual_fee_is_percentage==1)?number_format($data->annual_fee,2)." % of GAT":number_format($data->annual_fee,2)." ".Currency::model()->findByPk($data->annual_fee_currency_id)->name'),
		
		'duration',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
