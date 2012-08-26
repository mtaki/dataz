<?php
$this->breadcrumbs=array(
	'Licence Fees'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LicenceFee', 'url'=>array('index')),
	array('label'=>'Create LicenceFee', 'url'=>array('create')),
	array('label'=>'Update LicenceFee', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LicenceFee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LicenceFee', 'url'=>array('admin')),
);
?>

<h1>View Licence Fee</h1>
<table > 
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
		'licenceCategory.name',
		'marketSegment.name',
		'type_service',
		array('label'=>'Application Fee','value'=>number_format($model->application_fee,2).' '.$model->applicationFeeCurrency->name),
		array('label'=>'Initial Fee','value'=>number_format($model->initial_fee,2).' '.$model->initialFeeCurrency->name),
		array('label'=>'Annual Fee','value'=>''.number_format($model->annual_fee,2).' '.(($model->annual_fee_is_percentage)?'% of GAT':$model->annualFeeCurrency->name)),
		'duration',
		'type_of_licence',
		
	),
)); ?>
