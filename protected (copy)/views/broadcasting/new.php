<h1>Create Frequency</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php $groups=FrequencyType::model()->findAll("id <> 4 and id <> 5");
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		$select_group=CHtml::dropDownList('category','', $groupsArray);
	echo "<table>
		<tr><td>Type</td><td>$select_group</td></tr>
		
		<tr><td>&nbsp;</td><td>".CHtml::submitButton('Continue')."</td></tr>
	</table>";
?>

<?php $this->endWidget(); ?>

