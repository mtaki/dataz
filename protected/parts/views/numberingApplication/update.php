<?php
$this->breadcrumbs=array(
	'Numbering Applications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NumberingApplication', 'url'=>array('index')),
	array('label'=>'Create NumberingApplication', 'url'=>array('create')),
	array('label'=>'View NumberingApplication', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NumberingApplication', 'url'=>array('admin')),
);
?>

<h1>Update NumberingApplication <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>