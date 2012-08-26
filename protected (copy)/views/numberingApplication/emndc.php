<?php $form=$this->beginWidget('CActiveForm', array(

	'method'=>'post',
)); ?>
<?php echo CHtml::errorSummary(array($a)); ?>
<h1>New Numbering Application</h1>
<table>
<tr><td colspan='2'>MNDC
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>General Information</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Applicant</td>

    <td>
    <?php 
echo $form->hiddenField($a,'operator_id'); 
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
 			 'value'=>$a->applicant->name,
             'methodChain'=>".result(function(event,item){\$(\"#NumberingApplication_operator_id\").val(item[1]);})",
             ));
    ?>
    </td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Service Licence Number</td>
    <td><?php echo $form->textField($a,'service_licence_number',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>Application date</td>

    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'NumberingApplication[application_date]',
        'value'=>$a->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </table>

</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
  <legend><strong>Preferred (if any) Mobile Network Destination Code(s) applied for Assignment/Reservations</strong></legend>
  <table width="800" border="0" cellspacing="0" cellpadding="0">
	<?php 
	$c=1;
	$rs=NumberingResource::model()->findAll('application_id='.$a->id);
	$numbers=array();
	foreach ($rs as $numberingResource){
		$numbers[''.$c]=$numberingResource->num;
		$c++;
	}
	for($i=1;$i<=5;$i++){
		$value='';
		if(!empty($numbers[''.$i]))
			$value=$numbers[''.$i];
		echo "<tr><td>Number $i</td><td>".CHtml::textField('number'.$i, $value)."</td></tr>";
	}
	?>
  </table>
  </fieldset>
  

<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Purpose of the applied Mobile Network Destination Code(s)</td>

  </tr>
<tr>
    <td><?php echo $form->textArea($a,'purpose',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
</table>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Provide a forecast on yearly basis on expected utilization of the applied code(s)</td>

  </tr>
<tr>
    <td><?php echo $form->textArea($a,'forecast',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
</table>

<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Date by which the Assignment/Reservation is to be effected:</td>

    <td>&nbsp;
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'NumberingApplication[effective_date]',
        'value'=>$a->effective_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table>
 <tr>
    <td>Planned date for the service to be operational using the applied number ranges:
    </td>
    <td>&nbsp;
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'NumberingApplication[operation_start_date]',
        'value'=>$a->operation_start_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>

<table>
  <tr>
    <td><br/>Geographical Area(s) where the service will be offered using the applied number range(s)..</td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->textArea($a,'areas',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
</table>


<table>
  <tr>
    <td><br/>Status of the existing Assignment and End-User utilizations: Indicate which Mobile Network Destination Code(s) is/are in use:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td><?php echo $form->textArea($a,'status_existing_numbers',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Any other information that you consider appropriate to support your applications:</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->textArea($a,'other_info',array('size'=>15,'maxlength'=>50)); ?></td>
    <td><?php
	echo $form->hiddenField($a,'numbering_fee_type_id',array('size'=>15,'maxlength'=>50,'value'=>$a->numbering_resource_type_id));
	?>
	<?php
	echo $form->hiddenField($a,'numbering_resource_type_id',array('size'=>15,'maxlength'=>50,'value'=>$a->numbering_resource_type_id));
	?>
  </tr>
  <tr>

    <td></td>
    <td></td>
  </tr>
  </table>
  </fieldset>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td>&nbsp;</td>
  	<td>&nbsp;</td>

	<td>&nbsp;</td>
  	<td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  </table>
 
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Particulars of Authorised person who filled the application form</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name</td>
    <td><?php echo $form->textField($a,'signatory_name',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>Date</td>

    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'NumberingApplication[sign_date]',
        'value'=>$a->sign_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>
  </tr>
  <tr>
    <td>Position</td>
    <td><?php echo $form->textField($a,'signatory_title',array('size'=>15,'maxlength'=>50)); ?>
    </td>
    <td></td>
    <td></td>
  </tr>

  </table>
  </fieldset>
</td></tr>
<tr><td><input type='submit' name='insert' value='Submit'></td><td>&nbsp;</td></tr>
</table>
<?php $this->endWidget(); ?>