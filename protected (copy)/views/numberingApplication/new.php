<h1>Create Numbering Application</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php $groups=NumberingResourceType::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		$select_group=CHtml::dropDownList('type','', $groupsArray);

		
	echo "<table>
		<tr><td>Type:</td><td>$select_group</td></tr>
		<tr><td>&nbsp;</td><td>".CHtml::submitButton('Continue')."</td></tr>
	</table>";
?>

<?php $this->endWidget(); ?>
