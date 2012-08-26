<?php
$this->breadcrumbs=array(
	'Numbering Resources'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NumberingResource', 'url'=>array('index')),
	array('label'=>'Manage NumberingResource', 'url'=>array('admin')),
);
?>

<h1>Create NumberingResource</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>