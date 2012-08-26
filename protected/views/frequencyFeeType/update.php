<?php
$this->breadcrumbs=array(
	'Frequency Fee Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyFeeType', 'url'=>array('index')),
	array('label'=>'Create FrequencyFeeType', 'url'=>array('create')),
	array('label'=>'View FrequencyFeeType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyFeeType', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyFeeType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>