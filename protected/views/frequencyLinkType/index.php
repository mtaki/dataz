<?php
$this->breadcrumbs=array(
	'Frequency Link Types',
);

$this->menu=array(
	array('label'=>'Create FrequencyLinkType', 'url'=>array('create')),
	array('label'=>'Manage FrequencyLinkType', 'url'=>array('admin')),
);
?>

<h1>Frequency Link Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
