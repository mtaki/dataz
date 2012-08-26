<?php
$this->breadcrumbs=array(
	'Currencys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Currency', 'url'=>array('index')),
	array('label'=>'Manage Currency', 'url'=>array('admin')),
);
?>

<h1>Create Currency</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Cancel',array('submit'=>Yii::app()->controller->createUrl('admin')));?>