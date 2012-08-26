<?php
$this->breadcrumbs=array(
	'Market Segments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MarketSegment', 'url'=>array('index')),
	array('label'=>'Manage MarketSegment', 'url'=>array('admin')),
);
?>

<h1>Create Market Segment</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>