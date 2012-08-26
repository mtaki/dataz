<?php
$this->breadcrumbs=array(
	'Districts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List District', 'url'=>array('index')),
	array('label'=>'Create District', 'url'=>array('create')),
	array('label'=>'View District', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage District', 'url'=>array('admin')),
);
?>

<h1>Update District <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Cancel',array('submit'=>Yii::app()->controller->createUrl('admin')));?>