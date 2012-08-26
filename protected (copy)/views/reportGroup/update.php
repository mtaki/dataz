<?php
$this->breadcrumbs=array(
	'Report Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportGroup', 'url'=>array('index')),
	array('label'=>'Create ReportGroup', 'url'=>array('create')),
	array('label'=>'View ReportGroup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReportGroup', 'url'=>array('admin')),
);
?>

<h1>Update ReportGroup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>