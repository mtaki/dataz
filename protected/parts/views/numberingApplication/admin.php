<?php
$this->breadcrumbs=array(
	'Numbering Applications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NumberingApplication', 'url'=>array('index')),
	array('label'=>'Create NumberingApplication', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('numbering-application-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$mytitle='';
if (Yii::app()->controller->action->id=='editList'){
			$mytitle='Edit Numbering Applications';
		}
		elseif (Yii::app()->controller->action->id=='evaluationList'){
			$mytitle='Numbering Applications Evaluation';
		}
		elseif (Yii::app()->controller->action->id=='approvalList'){
			$mytitle='Numbering Applications Approval';
		}
		elseif (Yii::app()->controller->action->id=='prepareList'){
			$mytitle='Numbering Applications Prepare Certificate';
		}
		elseif (Yii::app()->controller->action->id=='dispatchList'){
			$mytitle='Numbering Applications Dispatch Certificate';
		}
		else 
			$mytitle='Manage Numbering Applications';
?>

<h1><?php echo $mytitle; ?></h1>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'numbering-application-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'applicant.name:raw:Applicant',
		'numberingResourceType.name:raw:Type',
		'application_date',
		'status',
		array(
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("View"), $data->getViewUrl())'
		),
	),
)); ?>
