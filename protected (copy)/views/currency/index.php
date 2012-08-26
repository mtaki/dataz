<?php
$this->breadcrumbs=array(
	'Currencys',
);

$this->menu=array(
	array('label'=>'Create Currency', 'url'=>array('create')),
	array('label'=>'Manage Currency', 'url'=>array('admin')),
);
?>

<h1>Currencys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
