<?php
$this->breadcrumbs=array(
	'Broadcasting Station Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BroadcastingStationType', 'url'=>array('index')),
	array('label'=>'Create BroadcastingStationType', 'url'=>array('create')),
	array('label'=>'Update BroadcastingStationType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BroadcastingStationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BroadcastingStationType', 'url'=>array('admin')),
);
?>

<h1>View Station Type</h1>
<table> 
<tr>
<td><?php echo CHtml::Button('New',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('create')));?></td>
<td><?php echo CHtml::Button('Edit',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('Delete',array('class'=>'myButton','confirm'=>'Are you sure you want to delete this item?','submit'=>Yii::app()->controller->createUrl('delete',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name'
	),
)); ?>
