<?php
$this->breadcrumbs=array(
	'Licence Sub Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LicenceSubCategory', 'url'=>array('index')),
	array('label'=>'Manage LicenceSubCategory', 'url'=>array('admin')),
);
?>

<h1>Create Licence Category</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
