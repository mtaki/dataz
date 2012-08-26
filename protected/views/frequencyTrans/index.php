<?php
$this->breadcrumbs=array(
	'Frequency Trans',
);

$this->menu=array(
	array('label'=>'Create FrequencyTrans', 'url'=>array('create')),
	array('label'=>'Manage FrequencyTrans', 'url'=>array('admin')),
);
?>

<h1>Frequency Trans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
