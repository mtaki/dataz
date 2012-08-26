<?php
$this->breadcrumbs=array(
	'Citizenships'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Citizenship', 'url'=>array('index')),
	array('label'=>'Manage Citizenship', 'url'=>array('admin')),
);
?>

<h1>Create Citizenship</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Cancel',array('submit'=>Yii::app()->controller->createUrl('admin')));?>