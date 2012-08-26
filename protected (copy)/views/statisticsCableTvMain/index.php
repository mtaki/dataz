<?php
$this->breadcrumbs=array(
	'Statistics Cable Tv Mains',
);

$this->menu=array(
	array('label'=>'Create StatisticsCableTvMain', 'url'=>array('create')),
	array('label'=>'Manage StatisticsCableTvMain', 'url'=>array('admin')),
);
?>

<h1>Broadcasting Statistics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
