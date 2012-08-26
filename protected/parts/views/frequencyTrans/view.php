<?php
$this->breadcrumbs=array(
	'Frequency Trans'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FrequencyTrans', 'url'=>array('index')),
	array('label'=>'Create FrequencyTrans', 'url'=>array('create')),
	array('label'=>'Update FrequencyTrans', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyTrans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyTrans', 'url'=>array('admin')),
);
?>

<h1>View Frequency Transmission System</h1>
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
		'name',
		'frequencyType.name:raw:Type',
	),
)); ?>
