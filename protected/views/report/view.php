<h1>View Report <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'reportGroup.name:raw:Group',
		'file_name',
	),
)); ?>
Parameters
<table class='detail-view'>
<tr><td>Parameter</td><td>Type</td><td>Description</td></tr>
<?php $a='field1';
	$class='even';
	for($i=1;$i<=5;$i++){
		$field='field'.$i;
		$type='type'.$i;
		$description='description'.$i;
		if ($class=='even')
			$class='odd';
		else
			$class='even';
		if(!empty($model->$field))
			echo "
				<tr class='$class'><td>".$model->$field."</td><td>".$model->$type."</td><td>".$model->$description."</td></tr>
			";
		
	}
?>

</table>
