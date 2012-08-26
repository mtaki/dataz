<h1>View User <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'name',
	),
)); ?>
Groups
<?php 
$html="<table width='600' class='detail-view'>";
$class='odd';
foreach ($model->groups as $group){
	$html.="<tr class='$class'><td>$group->name</td></tr>";
	if ($class=='odd')
		$class='even';
	else 
		$class='odd';
}
$html.="</table>";
echo $html;
?>
<?php echo CHtml::Button('Go to List',array('submit'=>Yii::app()->createUrl('user/admin')));?>
<?php echo CHtml::Button('New',array('submit'=>Yii::app()->controller->createUrl('create')));?>