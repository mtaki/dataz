<?php
$this->breadcrumbs=array(
	'Other Fees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OtherFee', 'url'=>array('index')),
	array('label'=>'Manage OtherFee', 'url'=>array('admin')),
);
?>

<h1>Create Other Fee</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>