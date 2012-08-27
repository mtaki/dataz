<?php
$this->breadcrumbs=array(
	'Vsat Frequency Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VsatFrequencyData', 'url'=>array('index')),
	array('label'=>'Manage VsatFrequencyData', 'url'=>array('admin')),
);
?>

<h1>Create VsatFrequencyData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>