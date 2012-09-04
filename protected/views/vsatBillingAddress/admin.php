<?php
$this->breadcrumbs=array(
	'Vsat Billing Addresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VsatBillingAddress', 'url'=>array('index')),
	array('label'=>'Create VsatBillingAddress', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vsat-billing-address-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vsat Billing Addresses</h1>

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
	'id'=>'vsat-billing-address-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name_of_accounting',
		'a_phone_no',
		'a_fax_no',
		'name_of_sp',
		'sp_phone_no',
		'sp_fax_no',
		/*
		'application_vsat_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
