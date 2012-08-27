<?php
$this->breadcrumbs=array(
	'Vsat Antenna Datas',
);

$this->menu=array(
	array('label'=>'Create VsatAntennaData', 'url'=>array('create')),
	array('label'=>'Manage VsatAntennaData', 'url'=>array('admin')),
);
?>

<h1>Vsat Antenna Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
