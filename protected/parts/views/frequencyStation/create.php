<h1>New Station</h1>
<table>
<tr>
<td><?php echo CHtml::Button('Cancel',array('confirm'=>'Do you want to cancel?','submit'=>Yii::app()->controller->createUrl('admin')));?></td>
</tr>
</table>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-link-form',
	'enableAjaxValidation'=>false,

)); ?>

<table>
<tr><td>Operator</td><td>

	<?php echo $form->hiddenField($model,'operator_id'); 
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
          	  'value'=>(!empty($model->operator_id))?$model->operator->name:'',
             'methodChain'=>".result(function(event,item){\$(\"#FrequencyStation_operator_id\").val(item[1]);})",
             ));
    ?>
</td></tr>
<tr><td>Station Type</td><td>
		<?php
		echo $form->hiddenField($model,'station_type_id');
		
		 echo $model->frequencyStationtype->name; ?>
</td></tr>
<?php if ($model->frequencyStationtype->id==1){?>
<tr><td>Call sign</td><td>
		<?php
		echo $form->textField($model,'call_sign');?>
</td></tr>
<?php }?>
<tr><td>Licence Date</td><td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'FrequencyStation[licence_date]',
        'value'=>$model->licence_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
</td></tr>
<?php if ($model->frequencyStationtype->id==1 || $model->frequencyStationtype->id==4){?>
<tr><td>Region</td><td>
<?php $groups=Region::model()->findAll();
		$groupsArray=array();
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		echo CHtml::dropDownList('FrequencyStation[region_id]',$model->region_id, $groupsArray);
?>
</td></tr>
<?php }?>
</table>
<?php echo CHtml::submitButton('Save'); ?>
<?php $this->endWidget(); ?>
