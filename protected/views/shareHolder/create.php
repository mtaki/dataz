<?php
$this->breadcrumbs=array(
	'Share Holders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ShareHolder', 'url'=>array('index')),
	array('label'=>'Manage ShareHolder', 'url'=>array('admin')),
);
?>

<h1>Create ShareHolder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>