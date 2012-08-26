<?php
$this->breadcrumbs=array(
	'Currencys'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Currency', 'url'=>array('index')),
	array('label'=>'Create Currency', 'url'=>array('create')),
	array('label'=>'View Currency', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Currency', 'url'=>array('admin')),
);
?>

<h1>Update Currency <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo CHtml::Button('Go to List',array('submit'=>Yii::app()->controller->createUrl('admin')));?>