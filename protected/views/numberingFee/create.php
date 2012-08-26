<?php
$this->breadcrumbs=array(
	'Numbering Fees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NumberingFee', 'url'=>array('index')),
	array('label'=>'Manage NumberingFee', 'url'=>array('admin')),
);
?>

<h1>Create NumberingFee</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>