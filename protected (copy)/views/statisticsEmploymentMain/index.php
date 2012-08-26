<?php
$this->breadcrumbs=array(
	'Statistics Employment Mains',
);

$this->menu=array(
	array('label'=>'Create StatisticsEmploymentMain', 'url'=>array('create')),
	array('label'=>'Manage StatisticsEmploymentMain', 'url'=>array('admin')),
);
?>

<h1>Statistics Employment Mains</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
