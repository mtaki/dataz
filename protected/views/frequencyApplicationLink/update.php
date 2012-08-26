<?php
$this->breadcrumbs=array(
	'Frequency Application Links'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationLink', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationLink', 'url'=>array('create')),
	array('label'=>'View FrequencyApplicationLink', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyApplicationLink', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyApplicationLink <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>