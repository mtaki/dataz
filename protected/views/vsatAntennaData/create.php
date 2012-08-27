<?php
$this->breadcrumbs=array(
	'Vsat Antenna Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VsatAntennaData', 'url'=>array('index')),
	array('label'=>'Manage VsatAntennaData', 'url'=>array('admin')),
);
?>

<h1>Create VsatAntennaData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>