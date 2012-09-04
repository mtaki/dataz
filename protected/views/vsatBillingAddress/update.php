<?php
$this->breadcrumbs=array(
	'Vsat Billing Addresses'=>array('index'),
	$model->application_vsat_id=>array('view','id'=>$model->application_vsat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VsatBillingAddress', 'url'=>array('index')),
	array('label'=>'Create VsatBillingAddress', 'url'=>array('create')),
	array('label'=>'View VsatBillingAddress', 'url'=>array('view', 'id'=>$model->application_vsat_id)),
	array('label'=>'Manage VsatBillingAddress', 'url'=>array('admin')),
);
?>

<h1>Update VsatBillingAddress <?php echo $model->application_vsat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>