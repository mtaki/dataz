<?php
$this->breadcrumbs=array(
	'Application Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicationType', 'url'=>array('index')),
	array('label'=>'Create ApplicationType', 'url'=>array('create')),
	array('label'=>'View ApplicationType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApplicationType', 'url'=>array('admin')),
);
?>

<h1>Update ApplicationType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>