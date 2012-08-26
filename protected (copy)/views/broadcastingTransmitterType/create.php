<?php
$this->breadcrumbs=array(
	'Broadcasting Transmitter Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BroadcastingTransmitterType', 'url'=>array('index')),
	array('label'=>'Manage BroadcastingTransmitterType', 'url'=>array('admin')),
);
?>

<h1>Create Transmitter Type</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>