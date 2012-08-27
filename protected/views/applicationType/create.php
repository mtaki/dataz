<?php
$this->breadcrumbs=array(
	'Application Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicationType', 'url'=>array('index')),
	array('label'=>'Manage ApplicationType', 'url'=>array('admin')),
);
?>

<h1>Create ApplicationType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>