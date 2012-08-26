<?php
$this->breadcrumbs=array(
	'Citizenships',
);

$this->menu=array(
	array('label'=>'Create Citizenship', 'url'=>array('create')),
	array('label'=>'Manage Citizenship', 'url'=>array('admin')),
);
?>

<h1>Citizenships</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
