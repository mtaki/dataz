<?php
$this->breadcrumbs=array(
	'Share Holders'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShareHolder', 'url'=>array('index')),
	array('label'=>'Create ShareHolder', 'url'=>array('create')),
	array('label'=>'View ShareHolder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ShareHolder', 'url'=>array('admin')),
);
?>

<h1>Update ShareHolder <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>