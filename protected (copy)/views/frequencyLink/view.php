<?php
$this->breadcrumbs=array(
	'Frequency Links'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FrequencyLink', 'url'=>array('index')),
	array('label'=>'Create FrequencyLink', 'url'=>array('create')),
	array('label'=>'Update FrequencyLink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FrequencyLink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FrequencyLink', 'url'=>array('admin')),
);
?>

<h1>View Frequency Link</h1>
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
		'operator.name',
		'frequencyLinkType.name:raw:Type',
		'num',
		'description',
	),
)); ?>
