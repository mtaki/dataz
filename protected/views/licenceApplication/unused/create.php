<?php
$this->breadcrumbs=array(
	'Licence Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Manage LicenceApplication', 'url'=>array('admin')),
);
?>

<h1>LicenceApplication</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>