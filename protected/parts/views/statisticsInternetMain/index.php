<?php
$this->breadcrumbs=array(
	'Statistics Internet Mains',
);

$this->menu=array(
	array('label'=>'Create StatisticsInternetMain', 'url'=>array('create')),
	array('label'=>'Manage StatisticsInternetMain', 'url'=>array('admin')),
);
?>

<h1>Statistics Internet Mains</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
