<?php
$this->breadcrumbs=array(
	'Market Segments',
);

$this->menu=array(
	array('label'=>'Create MarketSegment', 'url'=>array('create')),
	array('label'=>'Manage MarketSegment', 'url'=>array('admin')),
);
?>

<h1>Market Segments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
