<?php
$this->breadcrumbs=array(
	'Vsat Site Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VsatSiteData', 'url'=>array('index')),
	array('label'=>'Manage VsatSiteData', 'url'=>array('admin')),
);
?>

<h1>Create VsatSiteData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>