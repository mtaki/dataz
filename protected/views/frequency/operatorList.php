<?php
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
?>
<h1>Select Operator</h1>
<div class="search-form" ">
<?php $this->renderPartial('//operator/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'licence-application-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id','name:raw:Operator','telephone','mobile','address','town',
		array(
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode("View"), Yii::app()->createUrl("frequency/licenceeView",array("id"=>$data->id)))'
		),
	),
	
));

//'template'=>"{items}\n{summary}\n{pager}",
?>
