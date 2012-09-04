<?php
$this->breadcrumbs=array(
	'Vsat Operation Addresses'=>array('index'),
	$model->application_vsat_id,
);

$this->menu=array(
	array('label'=>'List VsatOperationAddress', 'url'=>array('index')),
	array('label'=>'Create VsatOperationAddress', 'url'=>array('create')),
	array('label'=>'Update VsatOperationAddress', 'url'=>array('update', 'id'=>$model->application_vsat_id)),
	array('label'=>'Delete VsatOperationAddress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->application_vsat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VsatOperationAddress', 'url'=>array('admin')),
);
?>

<h1>View VsatOperationAddress #<?php echo $model->application_vsat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'operation_name',
		'phone_no',
		'operator_company_name',
		'fax_no',
		'contry_of_registry',
		'city_address',
		'district',
		'country',
		'application_vsat_id',
	),
)); ?>
