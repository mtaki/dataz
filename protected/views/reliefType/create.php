<?php
$this->breadcrumbs=array(
	'Relief Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReliefType', 'url'=>array('index')),
	array('label'=>'Manage ReliefType', 'url'=>array('admin')),
);
?>

<h1>Create Relief Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>