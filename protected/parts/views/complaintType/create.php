<?php
$this->breadcrumbs=array(
	'Complaint Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ComplaintType', 'url'=>array('index')),
	array('label'=>'Manage ComplaintType', 'url'=>array('admin')),
);
?>

<h1>Create Complaint Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>