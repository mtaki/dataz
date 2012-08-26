<?php
$this->breadcrumbs=array(
	'Air Time Destinations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AirTimeDestination', 'url'=>array('index')),
	array('label'=>'Manage AirTimeDestination', 'url'=>array('admin')),
);
?>

<h1>Create Air Time Destination</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>