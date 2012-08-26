<?php
$this->breadcrumbs=array(
	'Numbering Fees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NumberingFee', 'url'=>array('index')),
	array('label'=>'Create NumberingFee', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('numbering-fee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Numbering Fees</h1>


<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'numbering-fee-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		
		'type.name',
		
		array('htmlOptions'=>array('style'=>'text-align:right'),'header'=>'Registrattion Fee','value'=>'number_format($data->registration_fee,2)." ".$data->registrationFeeCurrency->name'),
		array('htmlOptions'=>array('style'=>'text-align:right'),'header'=>'Annual Fee','value'=>'number_format($data->annual_fee,2)." ".$data->annualFeeCurrency->name'),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
