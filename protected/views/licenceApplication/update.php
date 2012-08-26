<?php
$this->breadcrumbs=array(
	'Licence Applications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Create LicenceApplication', 'url'=>array('create')),
	array('label'=>'View LicenceApplication', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LicenceApplication', 'url'=>array('admin')),
);
?>

<h1>Update LicenceApplication <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>