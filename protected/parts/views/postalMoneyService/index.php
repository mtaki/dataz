<?php
$this->breadcrumbs=array(
	'Postal Money Services',
);

$this->menu=array(
	array('label'=>'Create PostalMoneyService', 'url'=>array('create')),
	array('label'=>'Manage PostalMoneyService', 'url'=>array('admin')),
);
?>

<h1>Postal Money Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
