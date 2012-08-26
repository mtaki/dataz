<?php
$this->breadcrumbs=array(
	'Air Time Movements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AirTimeMovement', 'url'=>array('index')),
	array('label'=>'Manage AirTimeMovement', 'url'=>array('admin')),
);
?>

<h1>Create AirTimeMovement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>