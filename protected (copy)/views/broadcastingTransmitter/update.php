<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitter', 'url'=>array('index')),
	array('label'=>'Create BroadcastingTransmitter', 'url'=>array('create')),
	array('label'=>'View BroadcastingTransmitter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BroadcastingTransmitter', 'url'=>array('admin')),
);
?>

<h1>Update BroadcastingTransmitter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>