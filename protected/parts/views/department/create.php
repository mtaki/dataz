<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<h1>Create Department</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Cancel',array('submit'=>Yii::app()->controller->createUrl('admin')));?>