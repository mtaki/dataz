<?php
$this->breadcrumbs=array(
	'Numbering Resources'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NumberingResource', 'url'=>array('index')),
	array('label'=>'Create NumberingResource', 'url'=>array('create')),
	array('label'=>'View NumberingResource', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NumberingResource', 'url'=>array('admin')),
);
?>

<h1>Update NumberingResource <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>