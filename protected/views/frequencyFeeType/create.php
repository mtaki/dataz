<?php
$this->breadcrumbs=array(
	'Frequency Fee Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyFeeType', 'url'=>array('index')),
	array('label'=>'Manage FrequencyFeeType', 'url'=>array('admin')),
);
?>

<h1>Create FrequencyFeeType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>