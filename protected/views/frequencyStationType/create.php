<?php
$this->breadcrumbs=array(
	'Frequency Station Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyStationType', 'url'=>array('index')),
	array('label'=>'Manage FrequencyStationType', 'url'=>array('admin')),
);
?>

<h1>Create FrequencyStationType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>