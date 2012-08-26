<?php
$this->breadcrumbs=array(
	'Broadcasting Stations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BroadcastingStation', 'url'=>array('index')),
	array('label'=>'Create BroadcastingStation', 'url'=>array('create')),
	array('label'=>'View BroadcastingStation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BroadcastingStation', 'url'=>array('admin')),
);
?>

<h1>Update BroadcastingStation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>