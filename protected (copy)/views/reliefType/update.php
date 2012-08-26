<?php
$this->breadcrumbs=array(
	'Relief Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReliefType', 'url'=>array('index')),
	array('label'=>'Create ReliefType', 'url'=>array('create')),
	array('label'=>'View ReliefType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReliefType', 'url'=>array('admin')),
);
?>

<h1>Update Relief Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>