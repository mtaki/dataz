

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<table>
<tr><td><?php echo $form->label($model,'description'); ?></td><td><?php echo $form->textField($model,'description',array('size'=>15,'maxlength'=>50)); ?></td>
<td>Operator</td><td>
<?php 
echo CHtml::hiddenField('Frequency[operator_id]');
$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'operator_name', 
                         //replace controller/action with real ids
             'url'=>array('operator/autoCompleteLookup'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'15'), 
 
             'methodChain'=>".result(function(event,item){\$(\"#Frequency_operator_id\").val(item[1]);})",
             ));
    ?>
</td></tr>
<tr><td><?php echo $form->label($model,'status'); ?></td><td><?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>50)); ?></td>
<td>Type</td><td>
<?php 
$groups=FrequencyType::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		echo $select_group=CHtml::dropDownList('Frequency[frequency_type_id]','', $groupsArray);?></td>
</tr>
</table>
	


	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>