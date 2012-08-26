<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>General Information</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Applicant</td>

    <td>
    <?php 
echo $form->hiddenField($model,'operator_id'); 
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
             'methodChain'=>".result(function(event,item){\$(\"#FrequencyApplication_operator_id\").val(item[1]);})",
             ));
    ?>
    <script type="text/javascript">

function openOperator() {
var url='';
url='<?php echo Yii::app()->createUrl('operator/edit'); ?>';
if(document.getElementById("FrequencyApplication_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('FrequencyApplication_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
    <input type="button" onclick="openOperator();" value='Update Applicant Details'>
    <?php echo $form->textField($model,'frequency_application_type_id'); ?></td>
    <td>Application date</td>

    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'FrequencyApplication[application_date]',
        'value'=>$model->application_date,
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
    <td><?php if ($model->isNewRecord) echo 'Receipt No.'; ?></td>
    <td><?php if ($model->isNewRecord) echo $form->textField($c,'num',array('size'=>15,'maxlength'=>50)); ?></td>

    
  
    <td></td>
    <td></td>
  </tr>
  </table>

</fieldset>
<?php if($model->frequency_application_type_id==1) {  //amateur station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>TYPE OF AMATEUR LICENCE APPLIED FOR</strong></legend>
<?php 
		$ms=AmateurType::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('FrequencyApplication[amateur_type_id]',$model->amateur_type_id, $mArray);
		?>
</fieldset>	

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>PARTICULARS OF APPLICANT</strong></legend>
<table>
<tr>
<td>Nationality</td><td><?php echo $form->textField($model,'amateur_nationality',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Passport number</td><td><?php echo $form->textField($model,'amateur_passport_number',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Applicant date of birth</td><td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'FrequencyApplication[amateur_date_birth]',
        'value'=>$model->amateur_date_birth,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?></td>
</tr>
<tr>
<td>Do you possess a current Amateur licence?</td><td>Yes<?php echo $form->radioButton($model,'amateur_possess_licence',array('value'=>1,'uncheckValue'=>null)); ?> No <?php echo $form->radioButton($model,'amateur_possess_licence',array('value'=>0,'uncheckValue'=>null)); ?></td>
</tr>
<tr>
<td>If yes give Call sign</td><td><?php echo $form->textField($model,'amateur_call_sign',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>License issuing Authority</td><td><?php echo $form->textField($model,'amateur_issuing_authority',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>PARENT/GUARDIAN CONTACT</strong></legend>
<table>
<tr>
<td>Name of Parent/ Guardian</td><td><?php echo $form->textField($model,'amateur_guardian_name',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Nationality</td><td><?php echo $form->textField($model,'amateur_guardian_nationality',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Passport number</td><td><?php echo $form->textField($model,'amateur_guardian_passport_number',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Physical Address: Town</td><td><?php echo $form->textField($model,'amateur_guardian_town',array('size'=>15,'maxlength'=>50)); ?> Sreet <?php echo $form->textField($model,'amateur_guardian_street',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Postal Address:</td><td><?php echo $form->textField($model,'amateur_guardian_address',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Telephone</td><td><?php echo $form->textField($model,'amateur_guardian_telephone',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $form->textField($model,'amateur_guardian_email',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Fax</td><td><?php echo $form->textField($model,'amateur_guardian_fax',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>REFEREES FOR THE APPLICANT</strong></legend>
<B>First Referee</B>
<table>
<tr>
<td>Name</td><td><?php echo $form->textField($model,'amateur_referee_1_name',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>P.O. Box</td><td><?php echo $form->textField($model,'amateur_referee_1_address',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Town</td><td><?php echo $form->textField($model,'amateur_referee_1_town',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Telephone</td><td><?php echo $form->textField($model,'amateur_referee_1_telephone',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $form->textField($model,'amateur_referee_1_email',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
<B>Second Referee</B>
<table>
<tr>
<td>Name</td><td><?php echo $form->textField($model,'amateur_referee_2_name',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>P.O. Box</td><td><?php echo $form->textField($model,'amateur_referee_2_address',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Town</td><td><?php echo $form->textField($model,'amateur_referee_2_town',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Telephone</td><td><?php echo $form->textField($model,'amateur_referee_2_telephone',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Email</td><td><?php echo $form->textField($model,'amateur_referee_2_email',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>RADIO AMATEUR TRANSMIT SECTION TO BE USED</strong></legend>
<table>
<tr>
<td>Make & Type of equipment</td><td><?php echo $form->textField($model,'amateur_equipment_made',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Model</td><td><?php echo $form->textField($model,'amateur_equipment_model',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Frequency ranges covered</td><td><?php echo $form->textField($model,'amateur_equipment_frequency_range',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Maximum Transmit Output Power (in watts)</td><td><?php echo $form->textField($model,'amateur_equipment_power',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Antenna Make & Type</td><td><?php echo $form->textField($model,'amateur_equipment_antenna_make',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td>Antenna Gain</td><td><?php echo $form->textField($model,'amateur_equipment_antenna_gain',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>EVIDENCE FOR AMATEUR RADIO TRAINING</strong></legend>
<table>
<tr>
<td>Have you pass any Morse test for Radio amateur?</td><td>Yes<?php echo $form->radioButton($model,'amateur_pass_morse_test',array('value'=>1,'uncheckValue'=>null)); ?> No <?php echo $form->radioButton($model,'amateur_pass_morse_test',array('value'=>0,'uncheckValue'=>null)); ?></td>
</tr>
</table>
</fieldset>
<?php } //end of amateur station?>

<?php if ($model->frequency_application_type_id==2) {  //ship station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE APPLICANT</strong></legend>
<table>
<tr>
<td>Purpose for which this service is required</td><td><?php echo $form->textField($model,'purpose',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE SHIP STATION</strong></legend>
<table>
<tr>
<td>Name of Address of Ship Owner</td><td><?php echo $form->textField($model,'ship_owner',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
<tr>
<td>Name of the Ship</td><td><?php echo $form->textField($model,'ship_name',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
<tr>
<td>Type of Ship</td><td><?php echo $form->textField($model,'ship_type',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
<tr>
<td>Ship Registration Number</td><td><?php echo $form->textField($model,'ship_registration_number',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Details of Radio Equipment fitted in the Ship</strong></legend>

</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Certification of Seaworthiness and Survey certificate</strong></legend>
<table>
<tr>
<td>Seaworthiness conducted and certification issued?</td><td>Yes<?php echo $form->radioButton($model,'ship_certificate_issued',array('value'=>1,'uncheckValue'=>null)); ?> No <?php echo $form->radioButton($model,'ship_certificate_issued',array('value'=>0,'uncheckValue'=>null)); ?></td>
</tr>
<tr>
<td>Inspection of the Ship conducted and Survey report form issued?</td><td>Yes<?php echo $form->radioButton($model,'ship_certificate_done',array('value'=>1,'uncheckValue'=>null)); ?> No <?php echo $form->radioButton($model,'ship_certificate_done',array('value'=>0,'uncheckValue'=>null)); ?></td>
</tr>
</table>
</fieldset>
<?php }?>

<?php if ($model->frequency_application_type_id==3) {  //aircfta station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE APPLICANT</strong></legend>
<table>
<tr>
<td>Purpose for which this service is required</td><td><?php echo $form->textField($model,'purpose',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>INFORMATION ON THE AIRCRAFT STATION</strong></legend>
<table>
<tr>
<td>Name and Address of Aircraft Owner</td><td><?php echo $form->textField($model,'aircraft_owner',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>

<tr>
<td>Type of Aircraft</td><td><?php echo $form->textField($model,'aircraft_type',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>

<tr>
<td>Aircraft Registration Number</td><td><?php echo $form->textField($model,'aircraft_registration_number',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Radio Equipment fitted in the Aircraft</strong></legend>

</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Certification of Airworthiness and Inspection Request of the Aircraft by
the Tanzania Civil Aviation Authority
</strong></legend>
<table>
<tr>
<td>Airworthiness conducted and certification issued?</td><td>Yes<?php echo $form->radioButton($model,'aircraft_certificate_issued',array('value'=>1,'uncheckValue'=>null)); ?> No <?php echo $form->radioButton($model,'aircraft_certificate_issued',array('value'=>0,'uncheckValue'=>null)); ?></td>
</tr>
<tr>
<td>Inspection of the Aircraft conducted and Aircraft radio station
inspection report form issued?
</td><td>Yes<?php echo $form->radioButton($model,'aircraft_inspection_done',array('value'=>1,'uncheckValue'=>null)); ?> No <?php echo $form->radioButton($model,'aircraft_inspection_done',array('value'=>0,'uncheckValue'=>null)); ?></td>
</tr>
</table>
</fieldset>
<?php }?>

<?php if ($model->frequency_application_type_id==4) {  //radio station?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>PURPOSE:
</strong></legend>
<table>
<tr valign='top'>
<td>Purpose of Radio Service:
</td><td><?php echo $form->textArea($model,'purpose',array('size'=>15,'maxlength'=>50)); ?>
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>B: EQUIPMENT GENERAL SPECIFICATIONS
</strong></legend>
<table>
<tr valign='top'>
<td>Make and Type:</td>
<td colspan='3'><?php echo $form->textField($model,'radio_equipment_make',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr valign='top'>
<td>Seller’s Name and Address:</td>
<td colspan='3'><?php echo $form->textArea($model,'radio_equipment_seller_name_address',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
<tr>
<td colspan='4'>Frequency Range:</td>
</tr>
<tr valign='top'>

<td>Fixed/mobile:
</td><td>From <?php echo $form->textField($model,'radio_equipment_fixed_from',array('size'=>10,'maxlength'=>20)); ?>
To <?php echo $form->textField($model,'radio_equipment_fixed_to',array('size'=>10,'maxlength'=>20)); ?>
 <?php 

	$ms=FrequencyUnit::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('FrequencyApplication[radio_equipment_fixed_unit]',$model->radio_equipment_fixed_unit, $mArray);
?></td>

</tr>
<tr>
<td>Portable:</td>
<td>From <?php echo $form->textField($model,'radio_equipment_portable_from',array('size'=>10,'maxlength'=>20)); ?>
To <?php echo $form->textField($model,'radio_equipment_portable_to',array('size'=>10,'maxlength'=>20)); ?>
 <?php 

	$ms=FrequencyUnit::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('FrequencyApplication[radio_equipment_portable_unit]',$model->radio_equipment_portable_unit, $mArray);
?>	
</td>
</tr>

<tr>
<td colspan='4'>Number of channels:</td>
</tr>
<tr valign='top'>

<td>Fixed/mobile:
</td><td> <?php echo $form->textField($model,'radio_equipment_fixed_channels',array('size'=>10,'maxlength'=>20)); ?>

</tr>
<tr>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_equipment_portable_channels',array('size'=>10,'maxlength'=>20)); ?>
</td>
</tr>
<tr>
<td >Type of Equipment:</td>
<td colspan='3'><?php 

	$ms=RadioEquipmentType::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('FrequencyApplication[radio_equipment_type_id]',$model->radio_equipment_type_id, $mArray);
?>	
</td>
</tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>C: TECHNICAL SPECIFICATIONS</strong></legend>
<table>
<tr><td colspan='4'><B>Transmitter</B></td></tr>
<tr><td colspan='4'>Output power (e.r.p)</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_power_fixed',array('size'=>10,'maxlength'=>20)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_power_portable',array('size'=>10,'maxlength'=>20)); ?>
</tr>

<tr><td colspan='4'>Frequency stability</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_stability_fixed',array('size'=>10,'maxlength'=>20)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_stability_portable',array('size'=>10,'maxlength'=>20)); ?>
</tr>

<tr><td colspan='4'>Nominal bandwidth</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_nominal_bandwidth_fixed',array('size'=>10,'maxlength'=>20)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_nominal_bandwidth_portable',array('size'=>10,'maxlength'=>20)); ?>
</tr>

<tr><td colspan='4'>Type of Modulation</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_modulation_fixed',array('size'=>10,'maxlength'=>30)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_modulation_portable',array('size'=>10,'maxlength'=>30)); ?>
</tr>

<tr><td colspan='4'>Class of Emission</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_emission_fixed',array('size'=>10,'maxlength'=>30)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_emission_portable',array('size'=>10,'maxlength'=>30)); ?>
</tr>

<tr><td colspan='4'>Spurious harmonics</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_harmonics_fixed',array('size'=>10,'maxlength'=>30)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_transmitter_harmonics_portable',array('size'=>10,'maxlength'=>30)); ?>
</tr>



<tr><td colspan='4'><B>Receiver</B></td></tr>
<tr><td colspan='4'>Sensitivity:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_receiver_sensitivity_fixed',array('size'=>10,'maxlength'=>20)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_receiver_sensitivity_portable',array('size'=>10,'maxlength'=>20)); ?>
</tr>

<tr><td colspan='4'>Selectivity:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_receiver_selectivity_fixed',array('size'=>10,'maxlength'=>20)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_receiver_selectivity_portable',array('size'=>10,'maxlength'=>20)); ?>
</tr>

<tr><td colspan='4'>Intermediation:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_receiver_intermediation_fixed',array('size'=>10,'maxlength'=>20)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_receiver_intermediation_portable',array('size'=>10,'maxlength'=>20)); ?>
</tr>

<tr><td colspan='4'>Spurious rejection:</td></tr>
<tr valign='top'>
<td>Fixed/mobile:</td>
<td> <?php echo $form->textField($model,'radio_receiver_rejection_fixed',array('size'=>10,'maxlength'=>30)); ?>
<td>Portable:</td>
<td> <?php echo $form->textField($model,'radio_receiver_rejection_portable',array('size'=>10,'maxlength'=>30)); ?>
</tr>

</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>D: ANTENNA:</strong></legend>
<table>
<tr><td>Type of antenna:</td><td><?php echo $form->textField($model,'radio_antenna_type',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Antenna gain:</td><td><?php echo $form->textField($model,'radio_antenna_gain',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Polarization:</td><td><?php echo $form->textField($model,'radio_antenna_polarization',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Azimuth of maximum radiation in degrees:</td><td><?php echo $form->textField($model,'radio_antenna_azimuth',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Angular with of radiation mainlobe in degrees:</td><td><?php echo $form->textField($model,'radio_antenna_angular',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Antenna height above ground level</td><td><?php echo $form->textField($model,'radio_antenna_height',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Site elevation above ground level</td><td><?php echo $form->textField($model,'radio_antenna_site_elevation',array('size'=>15,'maxlength'=>30)); ?></td></tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">

<legend><strong>E: LOCATION:</strong></legend>
<table>
<tr><td colspan='4' >Number and type of stations:</td></tr>
<tr>
<td>Fixed:<?php echo $form->textField($model,'radio_number_fixed',array('size'=>15,'maxlength'=>30)); ?></td>
<td>Repeater:<?php echo $form->textField($model,'radio_number_mobile',array('size'=>15,'maxlength'=>30)); ?></td>
<td>Mobile:<?php echo $form->textField($model,'radio_number_repeater',array('size'=>15,'maxlength'=>30)); ?></td>
<td>Portable:<?php echo $form->textField($model,'radio_number_portable',array('size'=>15,'maxlength'=>30)); ?></td>
</tr>
<tr>
<td colspan='2'>Length of circuit in kilometers</td><td colspan='2'><?php echo $form->textField($model,'radio_length',array('size'=>15,'maxlength'=>30)); ?></td>
</tr>
<tr>
<td colspan='2'>Areas of Operation
</td><td colspan='2'><?php echo $form->textField($model,'radio_area',array('size'=>15,'maxlength'=>30)); ?></td>
</tr>
<tr>
<td colspan='2'>Exact antenna site
</td><td colspan='2' valign="top"><?php echo $form->textArea($model,'radio_exact_antenna_site',array('size'=>15,'maxlength'=>100)); ?></td>
</tr>
<tr>
<td colspan='2'>Location of antenna
</td><td colspan='2'><?php echo $form->textField($model,'radio_location_antenna',array('size'=>15,'maxlength'=>100)); ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">

<legend><strong>F:</strong></legend>
<table>
<tr><td>Maximum hours of Operation</td><td>From <?php echo $form->textField($model,'radio_hours_from',array('size'=>15,'maxlength'=>100)); ?>To <?php echo $form->textField($model,'radio_hours_to',array('size'=>15,'maxlength'=>100)); ?></td></tr>
</table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>G:</strong></legend>
<table>
<tr><td valign="top">Any other remarks</td>
<td><?php echo $form->textArea($model,'radio_other_remarks',array('size'=>15,'maxlength'=>100)); ?></td></tr>
</table>
</fieldset>
<?php }?>

<?php if ($model->frequency_application_type_id==5) {  //links?>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>B. PURPOSE FOR WHICH FREQUENCY ALLOCATION OR ASSIGNMENT IS
  REQUIRED
</strong></legend>
<table>
<tr><td>Purpose:</td><td>
 <?php 

	
		$mArray=array();
		$mArray['']='Select';
		$mArray['New frequency allocation']='New frequency allocation';
		$mArray['Additional frequency assignment']='Additional frequency assignment';
		
		echo CHtml::dropDownList('FrequencyApplication[purpose]',$model->purpose, $mArray);
?></td></tr>
<tr><td>Type of Licence:</td><td>
 <?php echo $form->textField($model,'link_type_licence',array('size'=>15,'maxlength'=>30)); ?></td></tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>C.RADIOCOMMUNICATION NETWORK DETAILS</strong></legend>
<table>
<tr><td colspan='2'><B>C.1 Radio Equipment Details:</B></td></tr>
<tr><td>Make and Type:</td><td><?php echo $form->textField($model,'link_equipment_make',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Frequency band (GHz):</td><td><?php echo $form->textField($model,'link_equipment_frequency_band',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Operating frequency range (MHz):</td><td><?php echo $form->textField($model,'link_equipment_frequency_from',array('size'=>15,'maxlength'=>30)); ?><?php echo $form->textField($model,'link_equipment_frequency_from',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Channel Transmission Capacity (Mbps):</td><td><?php echo $form->textField($model,'link_equipment_channel_capacity',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Modulation Scheme:</td><td><?php echo $form->textField($model,'link_equipment_modulation_scheme',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Frequency Stability:</td><td><?php echo $form->textField($model,'link_equipment_frequency_stability',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Transmit power output to antenna (Watts):</td><td><?php echo $form->textField($model,'link_equipment_power',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Radiated spurious emissions:</td><td><?php echo $form->textField($model,'link_equipment_emission',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Receiver sensitivity:</td><td><?php echo $form->textField($model,'link_equipment_receiver_sensitivity',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Receiver adjacent channel selectivity:</td><td><?php echo $form->textField($model,'link_equipment_adjacent_channel_selectivity',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Number of frequency channels required:</td><td><?php echo $form->textField($model,'link_equipment_frequency_channels',array('size'=>15,'maxlength'=>30)); ?></td></tr>
<tr><td>Channelization Plan required:</td><td><?php echo $form->textField($model,'link_equipment_channelization_plan',array('size'=>15,'maxlength'=>50)); ?></td></tr>


<tr><td colspan='2'><B>C2. Antenna Details</B></td></tr>
<tr><td>Type and Make of Transmit/Receive antenna:</td><td><?php echo $form->textField($model,'link_antenna_make',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Receiving antenna gain (in dB/dBi):</td><td><?php echo $form->textField($model,'link_antenna_receiving_gain',array('size'=>15,'maxlength'=>15)); ?></td></tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>D. Radio Equipment Supply Information:</strong></legend>
<table>
<tr valign="top"><td colspan="2">Name and Address of the supplier:</td>
<td colspan="2">
<?php echo $form->textArea($model,'link_supplier_name_address',array('size'=>15,'maxlength'=>100)); ?></td>
</tr>
<tr valign="top"><td colspan="2">Postal Address:</td>
<td colspan="2">
<?php echo $form->textArea($model,'link_supplier_postal_address',array('size'=>15,'maxlength'=>100)); ?></td>
</tr>

<tr valign="top"><td>Business Telephone:</td>
<td>
<?php echo $form->textField($model,'link_supplier_telephone',array('size'=>15,'maxlength'=>100)); ?></td>
<td>
Fax:<?php echo $form->textField($model,'link_supplier_fax',array('size'=>15,'maxlength'=>100)); ?></td>
<td>
Email:<?php echo $form->textField($model,'link_supplier_email',array('size'=>15,'maxlength'=>100)); ?></td>
</tr>
<tr valign="top">
<td>Physical Address:</td>
<td colspan='3'>
<?php echo $form->textArea($model,'link_supplier_physical_address',array('size'=>15,'maxlength'=>100)); ?></td>
<td>
</tr>
<tr>
<td>Road/street:</td>
<td>
<?php echo $form->textField($model,'link_supplier_street',array('size'=>15,'maxlength'=>100)); ?></td>
<td>
<td>Plot No:</td>
<td>
<?php echo $form->textField($model,'link_supplier_plot',array('size'=>15,'maxlength'=>100)); ?></td>
<td>
</tr>
</table>
</fieldset>


<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>E. PROPOSED NETWORK ACCESS AND/OR TRANSMISSION FREQUENCY LINKS</strong></legend>
<table>
<tr>
<td>Number of frequency channels required:</td>
<td><?php echo $form->textField($model,'link_channels',array('size'=>15,'maxlength'=>11)); ?></td>
</tr>
<tr>
<td>RF channel bandwidth required:</td>
<td><?php echo $form->textField($model,'link_bandwidth',array('size'=>15,'maxlength'=>15)); ?></td>
</tr>
<tr>
<td>Transmit/receive separation:</td>
<td><?php echo $form->textField($model,'link_separation',array('size'=>15,'maxlength'=>15)); ?></td>
</tr>
<tr>
<td>Channel transmission capacity (Mbps):</td>
<td><?php echo $form->textField($model,'link_transmission_capacity',array('size'=>15,'maxlength'=>15)); ?></td>
</tr>
<tr>
<td>Channelization plan required:</td>
<td><?php echo $form->textField($model,'link_channelization_plan',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>F. DETAILS OF PROPOSED NETWORK ACCESS AND/OR TRANSDMISSION LINKS</strong></legend>

</fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>G. Miscellaneous Information</strong></legend>
<table>
<tr>
<td>Proposed date of putting into use:</td>
<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'FrequencyApplication[link_proposed_date]',
        'value'=>$model->link_proposed_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?></td>
</tr>
<tr>
<td>Any Remarks</td>
<td><?php echo $form->textField($model,'link_proposed_date',array('size'=>15,'maxlength'=>50)); ?></td>
</tr>
</table>
</fieldset>
<?php }?>




	
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Particulars of Authorised person who filled the application form</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name</td>
    <td><?php echo $form->textField($model,'declaration_signatory',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>Date</td>

    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'FrequencyApplication[declaration_date]',
        'value'=>$model->declaration_date,
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
    <td>Designation</td>
    <td><?php echo $form->textField($model,'declaration_designation',array('size'=>15,'maxlength'=>50)); ?>
    </td>
    <td></td>
    <td></td>
  </tr>

  </table>
  </fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->