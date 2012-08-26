<?php
$this->breadcrumbs=array(
	'Numbering Resource Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NumberingResourceType', 'url'=>array('index')),
	array('label'=>'Manage NumberingResourceType', 'url'=>array('admin')),
);
?>

<h1>Create NumberingResourceType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>