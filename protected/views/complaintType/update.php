<?php
$this->breadcrumbs=array(
	'Complaint Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ComplaintType', 'url'=>array('index')),
	array('label'=>'Create ComplaintType', 'url'=>array('create')),
	array('label'=>'View ComplaintType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ComplaintType', 'url'=>array('admin')),
);
?>

<h1>Update Complaint Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>