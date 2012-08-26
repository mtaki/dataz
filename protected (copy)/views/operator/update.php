<?php
$this->breadcrumbs=array(
	'Operators'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Operator', 'url'=>array('index')),
	array('label'=>'Create Operator', 'url'=>array('create')),
	array('label'=>'View Operator', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Operator', 'url'=>array('admin')),
);
?>

<h1>Update Operator <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

