<?php
$this->breadcrumbs=array(
	'Vsat Frequency Datas',
);

$this->menu=array(
	array('label'=>'Create VsatFrequencyData', 'url'=>array('create')),
	array('label'=>'Manage VsatFrequencyData', 'url'=>array('admin')),
);
?>

<h1>Vsat Frequency Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
