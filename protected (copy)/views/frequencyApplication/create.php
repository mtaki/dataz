<?php
$this->breadcrumbs=array(
	'Frequency Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyApplication', 'url'=>array('index')),
	array('label'=>'Manage FrequencyApplication', 'url'=>array('admin')),
);
?>

<h1>Frequency Application for <?php echo $model->frequencyType->name;?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'c'=>$c)); ?>