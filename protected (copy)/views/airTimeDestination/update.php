<?php
$this->breadcrumbs=array(
	'Air Time Destinations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AirTimeDestination', 'url'=>array('index')),
	array('label'=>'Create AirTimeDestination', 'url'=>array('create')),
	array('label'=>'View AirTimeDestination', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AirTimeDestination', 'url'=>array('admin')),
);
?>

<h1>Update Air Time Destination</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>