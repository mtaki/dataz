<?php
$this->breadcrumbs=array(
	'Vsat Site Datas'=>array('index'),
	$model->application_vsat_id=>array('view','id'=>$model->application_vsat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VsatSiteData', 'url'=>array('index')),
	array('label'=>'Create VsatSiteData', 'url'=>array('create')),
	array('label'=>'View VsatSiteData', 'url'=>array('view', 'id'=>$model->application_vsat_id)),
	array('label'=>'Manage VsatSiteData', 'url'=>array('admin')),
);
?>

<h1>Update VsatSiteData <?php echo $model->application_vsat_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>