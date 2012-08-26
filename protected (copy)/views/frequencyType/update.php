<?php
$this->breadcrumbs=array(
	'Frequency Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FrequencyType', 'url'=>array('index')),
	array('label'=>'Create FrequencyType', 'url'=>array('create')),
	array('label'=>'View FrequencyType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FrequencyType', 'url'=>array('admin')),
);
?>

<h1>Update Frequency Type</h1>
<table > 
<tr>
<td><?php echo CHtml::Button('New',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('create')));?></td>
<td><?php echo CHtml::Button('View',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('view',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('Delete',array('class'=>'myButton','confirm'=>'Are you sure you want to delete this item?','submit'=>Yii::app()->controller->createUrl('delete',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>