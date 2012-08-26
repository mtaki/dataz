<?php
$this->breadcrumbs=array(
	'Frequency Application Radio Stations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyApplicationRadioStation', 'url'=>array('index')),
	array('label'=>'Manage FrequencyApplicationRadioStation', 'url'=>array('admin')),
);
?>

<h1>Create FrequencyApplicationRadioStation</h1>

<?php echo $this->renderPartial('_form_action', array('model'=>$model,'log'=>$log,
		'frequencyApplication'=>$frequencyApplication)); ?>