<?php
$this->breadcrumbs=array(
	'Citizenships'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Citizenship', 'url'=>array('index')),
	array('label'=>'Create Citizenship', 'url'=>array('create')),
	array('label'=>'View Citizenship', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Citizenship', 'url'=>array('admin')),
);
?>

<h1>Update Citizenship <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Go to List',array('submit'=>Yii::app()->controller->createUrl('admin')));?>