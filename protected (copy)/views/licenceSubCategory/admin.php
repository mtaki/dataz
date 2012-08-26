<?php
$this->breadcrumbs=array(
	'Licence Sub Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LicenceSubCategory', 'url'=>array('index')),
	array('label'=>'Create LicenceSubCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('licence-sub-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Licence Categories</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Add',array('submit'=>Yii::app()->controller->createUrl('create')));?></td>
</tr>
</table>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'licence-sub-category-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		'licenceCategory.name',
		array(               // related city displayed as a link
           	'name'=>'Sub Category',
            'type'=>'raw',
            'value'=>'$data->name',
        ),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
