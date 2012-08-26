<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitter Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitterType', 'url'=>array('index')),
	array('label'=>'Create BroadcastingTransmitterType', 'url'=>array('create')),
	array('label'=>'View BroadcastingTransmitterType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BroadcastingTransmitterType', 'url'=>array('admin')),
);
?>

<h1>Update Transmitter Type</h1>
<table> 
<tr>
<td><?php echo CHtml::Button('New',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('create')));?></td>
<td><?php echo CHtml::Button('View',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('view',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('Delete',array('class'=>'myButton','confirm'=>'Are you sure you want to delete this item?','submit'=>Yii::app()->controller->createUrl('delete',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>