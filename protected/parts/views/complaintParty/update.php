<?php
$this->breadcrumbs=array(
	'Complaint Parties'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ComplaintParty', 'url'=>array('index')),
	array('label'=>'Create ComplaintParty', 'url'=>array('create')),
	array('label'=>'View ComplaintParty', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ComplaintParty', 'url'=>array('admin')),
);
?>

<h1>Edit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>