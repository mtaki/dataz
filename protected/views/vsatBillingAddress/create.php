<?php
$this->breadcrumbs=array(
	'Vsat Billing Addresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VsatBillingAddress', 'url'=>array('index')),
	array('label'=>'Manage VsatBillingAddress', 'url'=>array('admin')),
);
?>

<h1>Create VsatBillingAddress</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>