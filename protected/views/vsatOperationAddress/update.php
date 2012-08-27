<?php
$this->breadcrumbs=array(
	'Vsat Operation Addresses'=>array('index'),
	$model->application_vsat_id=>array('view','id'=>$model->application_vsat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VsatOperationAddress', 'url'=>array('index')),
	array('label'=>'Create VsatOperationAddress', 'url'=>array('create')),
	array('label'=>'View VsatOperationAddress', 'url'=>array('view', 'id'=>$model->application_vsat_id)),
	array('label'=>'Manage VsatOperationAddress', 'url'=>array('admin')),
);
?>

<h1>Update VsatOperationAddress <?php echo $model->application_vsat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>