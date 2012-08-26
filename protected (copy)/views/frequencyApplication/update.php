<?php
$this->breadcrumbs=array(
	'Frequency Applications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyApplication', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplication', 'url'=>array('create')),
	array('label'=>'View FrequencyApplication', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyApplication', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyApplication <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>