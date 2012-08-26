<?php
$this->breadcrumbs=array(
	'Operators'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Operator', 'url'=>array('index')),
	array('label'=>'Manage Operator', 'url'=>array('admin')),
);
?>

<h1>Create Operator</h1>

<?php echo $this->renderPartial('_create', array('model'=>$model)); ?>
