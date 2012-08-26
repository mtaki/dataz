<?php
$this->breadcrumbs=array(
	'Market Segments'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List MarketSegment', 'url'=>array('admin')),
	array('label'=>'Create MarketSegment', 'url'=>array('create')),
	array('label'=>'Update MarketSegment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MarketSegment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MarketSegment', 'url'=>array('admin')),
);
?>

<h1>View Market Segment <?php echo $model->name; ?></h1>
<table> 
<tr>
<td><?php echo CHtml::Button('New',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('create')));?></td>
<td><?php echo CHtml::Button('Edit',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('Delete',array('class'=>'myButton','confirm'=>'Are you sure you want to delete this item?','submit'=>Yii::app()->controller->createUrl('delete',array('id'=>$model->id))));?></td>
<td><?php echo CHtml::Button('List',array('class'=>'myButton','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'licenceCategory.name:raw:Licence Type',
		array('type'=>'raw','value'=>($model->licence_sub_category_id)?$model->licenceSubCategory->name:'','label'=>'Category'),
		'name',
		
	),
)); ?>

