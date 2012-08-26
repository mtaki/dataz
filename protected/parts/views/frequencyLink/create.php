<?php
$this->breadcrumbs=array(
	'Frequency Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FrequencyLink', 'url'=>array('index')),
	array('label'=>'Manage FrequencyLink', 'url'=>array('admin')),
);
?>

<h1>Create Frequency Link</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>