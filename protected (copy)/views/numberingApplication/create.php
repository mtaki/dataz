<?php
$this->breadcrumbs=array(
	'Numbering Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NumberingApplication', 'url'=>array('index')),
	array('label'=>'Manage NumberingApplication', 'url'=>array('admin')),
);
?>

<h1>Create NumberingApplication</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>