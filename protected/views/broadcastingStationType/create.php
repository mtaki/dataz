<?php
$this->breadcrumbs=array(
	'Broadcasting Station Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BroadcastingStationType', 'url'=>array('index')),
	array('label'=>'Manage BroadcastingStationType', 'url'=>array('admin')),
);
?>

<h1>Create Station Type</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>