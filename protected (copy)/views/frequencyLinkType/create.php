<?php
$this->breadcrumbs=array(
	'Frequency Link Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyLinkType', 'url'=>array('index')),
	array('label'=>'Manage FrequencyLinkType', 'url'=>array('admin')),
);
?>

<h1>Create FrequencyLinkType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>