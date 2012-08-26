<?php
$this->breadcrumbs=array(
	'Frequency Application Radio Stations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationRadioStation', 'url'=>array('index')),
	array('label'=>'Create FrequencyApplicationRadioStation', 'url'=>array('create')),
	array('label'=>'View FrequencyApplicationRadioStation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyApplicationRadioStation', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyApplicationRadioStation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>