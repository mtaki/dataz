<?php
$this->breadcrumbs=array(
	'Vsat Billing Addresses'=>array('index'),
	$model->application_vsat_id,
);

$this->menu=array(
	array('label'=>'List VsatBillingAddress', 'url'=>array('index')),
	array('label'=>'Create VsatBillingAddress', 'url'=>array('create')),
	array('label'=>'Update VsatBillingAddress', 'url'=>array('update', 'id'=>$model->application_vsat_id)),
	array('label'=>'Delete VsatBillingAddress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->application_vsat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VsatBillingAddress', 'url'=>array('admin')),
);
?>

<h1>View VsatBillingAddress #<?php echo $model->application_vsat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name_of_accounting',
		'a_phone_no',
		'a_fax_no',
		'name_of_sp',
		'sp_phone_no',
		'sp_fax_no',
		'application_vsat_id',
	),
)); ?>
