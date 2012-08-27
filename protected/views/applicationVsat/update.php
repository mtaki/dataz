<?php
$this->breadcrumbs=array(
	'Application Vsats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicationVsat', 'url'=>array('index')),
	array('label'=>'Create ApplicationVsat', 'url'=>array('create')),
	array('label'=>'View ApplicationVsat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApplicationVsat', 'url'=>array('admin')),
);
?>

<h1>Update ApplicationVsat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>