<?php
$this->breadcrumbs=array(
	'Vsat Site Datas',
);

$this->menu=array(
	array('label'=>'Create VsatSiteData', 'url'=>array('create')),
	array('label'=>'Manage VsatSiteData', 'url'=>array('admin')),
);
?>

<h1>Vsat Site Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
