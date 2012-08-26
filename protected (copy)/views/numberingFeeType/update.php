<?php
$this->breadcrumbs=array(
	'Numbering Fee Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NumberingFeeType', 'url'=>array('index')),
	array('label'=>'Create NumberingFeeType', 'url'=>array('create')),
	array('label'=>'View NumberingFeeType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NumberingFeeType', 'url'=>array('admin')),
);
?>

<h1>Update NumberingFeeType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>