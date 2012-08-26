<?php
$this->breadcrumbs=array(
	'Postal Money Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PostalMoneyService', 'url'=>array('index')),
	array('label'=>'Manage PostalMoneyService', 'url'=>array('admin')),
);
?>

<h1>Create PostalMoneyService</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>