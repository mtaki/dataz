<?php
$this->breadcrumbs=array(
	'Postal Money Services'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PostalMoneyService', 'url'=>array('index')),
	array('label'=>'Create PostalMoneyService', 'url'=>array('create')),
	array('label'=>'View PostalMoneyService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PostalMoneyService', 'url'=>array('admin')),
);
?>

<h1>Update PostalMoneyService <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>