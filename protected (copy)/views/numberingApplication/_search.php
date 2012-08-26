
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<table>
<tr>
<td><?php echo $form->label($model,'id'); ?></td>
<td><?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>20)); ?></td>
<td><?php echo $form->label($model,'operator_id'); ?></td>
<td>
<?php 
echo CHtml::hiddenField('NumberingApplication[operator_id]');
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
 
             'methodChain'=>".result(function(event,item){\$(\"#NumberingApplication_operator_id\").val(item[1]);})",
             ));
    ?>
</td>
<tr><td><?php echo $form->label($model,'application_date'); ?></td>
<td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'NumberingApplication[application_date]',
        'value'=>$model->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
        ),
        'htmlOptions'=>array('size'=>15),
       )
     );
?>
</td>

<?php $groups=NumberingResourceType::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		$select_group=CHtml::dropDownList('NumberingApplication[numbering_resource_type_id]','', $groupsArray);

		?>

<td>Type</td>
<td ><?php echo $select_group; ?></td>
</tr>

</table>

		<?php echo CHtml::submitButton('Search'); ?>
	

<?php $this->endWidget(); ?>
