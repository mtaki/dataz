<?php
$this->breadcrumbs=array(
	'Air Time Movements'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AirTimeMovement', 'url'=>array('index')),
	array('label'=>'Create AirTimeMovement', 'url'=>array('create')),
	array('label'=>'View AirTimeMovement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AirTimeMovement', 'url'=>array('admin')),
);
?>

<h1>Update Air Time Movement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>