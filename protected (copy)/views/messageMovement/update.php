<?php
$this->breadcrumbs=array(
	'Message Movements'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MessageMovement', 'url'=>array('index')),
	array('label'=>'Create MessageMovement', 'url'=>array('create')),
	array('label'=>'View MessageMovement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MessageMovement', 'url'=>array('admin')),
);
?>

<h1>Update Message Movement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>