<?php
$this->breadcrumbs=array(
	'Numbering Fees'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NumberingFee', 'url'=>array('index')),
	array('label'=>'Create NumberingFee', 'url'=>array('create')),
	array('label'=>'Update NumberingFee', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NumberingFee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NumberingFee', 'url'=>array('admin')),
);
?>

<h1>View NumberingFee #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numbering_fee_type_id',
		'registration_fee',
		'registration_fee_currency_id',
		'annual_fee',
		'annual_fee_currency_id',
		'subscriber_fee',
	),
)); ?>
