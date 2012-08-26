<?php
$this->breadcrumbs=array(
	'Frequency Station Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyStationType', 'url'=>array('index')),
	array('label'=>'Create FrequencyStationType', 'url'=>array('create')),
	array('label'=>'View FrequencyStationType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyStationType', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyStationType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>