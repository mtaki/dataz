<?php
$this->breadcrumbs=array(
	'Report Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportGroup', 'url'=>array('index')),
	array('label'=>'Manage ReportGroup', 'url'=>array('admin')),
);
?>

<h1>Create ReportGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>