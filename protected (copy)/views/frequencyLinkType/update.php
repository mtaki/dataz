<?php
$this->breadcrumbs=array(
	'Frequency Link Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyLinkType', 'url'=>array('index')),
	array('label'=>'Create FrequencyLinkType', 'url'=>array('create')),
	array('label'=>'View FrequencyLinkType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyLinkType', 'url'=>array('admin')),
);
?>

<h1>Update FrequencyLinkType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>