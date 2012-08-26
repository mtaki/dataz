<?php
$this->breadcrumbs=array(
	'Numbering Resource Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NumberingResourceType', 'url'=>array('index')),
	array('label'=>'Create NumberingResourceType', 'url'=>array('create')),
	array('label'=>'View NumberingResourceType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NumberingResourceType', 'url'=>array('admin')),
);
?>

<h1>Update NumberingResourceType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>