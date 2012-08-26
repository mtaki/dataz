<?php
/*$this->breadcrumbs=array(
	'Licence Applications'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Create LicenceApplication', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('licence-application-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$mytitle='View Applications';

if (Yii::app()->controller->action->id=='editList'){
			$mytitle='Edit Application';
		}
elseif (Yii::app()->controller->action->id=='evaluationList'){
			$mytitle='Evaluation of Application';
}
elseif (Yii::app()->controller->action->id=='approvalList'){
			$mytitle='Approval of Application';
}
elseif (Yii::app()->controller->action->id=='issueList'){
			$mytitle='Issuance of Licence';
}
elseif (Yii::app()->controller->action->id=='printList'){
	$mytitle='Preview Invoice';
}
elseif (Yii::app()->controller->action->id=='prepareList'){
	$mytitle='Prepare Licence';
}
elseif (Yii::app()->controller->action->id=='licenceList'){
	$mytitle='View Licence';
}
elseif (Yii::app()->controller->action->id=='viewList'){
	$mytitle='View Licence';
}
elseif (Yii::app()->controller->action->id=='licenceeList'){
	$mytitle='Licencee\'s Details';
}
elseif (Yii::app()->controller->action->id=='annualFeeList'){
	$mytitle='Licence Annual Fee';
}
elseif (Yii::app()->controller->action->id=='cancelList'){
	$mytitle='Cancel Licence';
}
?>
<h1><?php echo $mytitle;?></h1>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" ">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'licence-application-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id','applicant.name','licenceCategory.name','application_date','status','marketSegment.name',
		array(
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("View"), $data->getViewUrl())'
		),
	),
	
));

//'template'=>"{items}\n{summary}\n{pager}",
?>
