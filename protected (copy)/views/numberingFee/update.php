<?php
$this->breadcrumbs=array(
	'Numbering Fees'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NumberingFee', 'url'=>array('index')),
	array('label'=>'Create NumberingFee', 'url'=>array('create')),
	array('label'=>'View NumberingFee', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NumberingFee', 'url'=>array('admin')),
);
?>

<h1>Update NumberingFee <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>