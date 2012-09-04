<?php
$this->breadcrumbs=array(
	'Vsat Operation Addresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VsatOperationAddress', 'url'=>array('index')),
	array('label'=>'Manage VsatOperationAddress', 'url'=>array('admin')),
);
?>

<h1>Create VsatOperationAddress</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>