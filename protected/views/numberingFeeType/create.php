<?php
$this->breadcrumbs=array(
	'Numbering Fee Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NumberingFeeType', 'url'=>array('index')),
	array('label'=>'Manage NumberingFeeType', 'url'=>array('admin')),
);
?>

<h1>Create NumberingFeeType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>