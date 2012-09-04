<?php

?>

<h1><?php echo $a->licenceCategory->name; ?>&nbsp;&nbsp;Application</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php echo CHtml::errorSummary(array($a,$b,$c)); ?>
<?php
	echo $form->hiddenField($a,'licence_category_id',array('size'=>15,'maxlength'=>50,'value'=>$a->licence_category_id));
		
?>
<table>
<tr><td colspan='2'><B><?php //echo $a->licenceCategory->name; ?></B><BR/>
<table>
<tr>
<td  valign='top'>Applicant: 
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
 			 'value'=>(empty($a->operator_id))?'':$a->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#LicenceApplication_operator_id\").val(item[1]);})",
             ));
    ?>
    <script type="text/javascript">

function openOperator() {
var url='';
url='<?php echo Yii::app()->createUrl('operator/edit'); ?>';
if(document.getElementById("LicenceApplication_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('LicenceApplication_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
    <input type="button" onclick="openOperator();" value='Update Applicant Details'>
</td>
<td  valign='top'>Application&nbsp;Date: 
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[application_date]',
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
</table>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Licence Application Attachments</strong></legend>

<table  border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td colspan="4"><B>General</B></td>
    <td colspan="4"><B>Technology Plan with the following:-</B></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $form->checkBox($b,'transmittal_letter'); ?>Transmittal letter to the DG</td>
    <td><?php echo $form->checkBox($b,'rollout_plan'); ?>Network rollout plan (coverage, customer base projections, construction plan, radio frequency)</td>
    

  </tr>
  <tr>
    <td colspan="4"><?php echo $form->checkBox($b,'receipt_photocopy'); ?>Photo copy of receipt for application fees
<BR/>&nbsp;&nbsp;&nbsp;&nbsp;Receipt Number <?php echo $form->textField($c,'num',array('size'=>15,'maxlength'=>50)); ?></td>
	
    
	<td colspan="4"><?php echo $form->checkBox($b,'network_configuration'); ?>Network configurations</td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $form->checkBox($b,'certificate_incorporation'); ?>A certified copy of certificate of Incorporation or Registration</td>
	<td colspan="4"><?php echo $form->checkBox($b,'manual'); ?>Manuals, brochures and technical specifications</td>
    
  </tr>
  <tr>
    <td colspan="4"><?php echo $form->checkBox($b,'company_memorandum'); ?>A certified copy of Company's Memorandum Association</td>
    <td colspan="4"><B>Business Plan with the following:-</B><BR/><?php echo $form->checkBox($b,'service_offered'); ?>Service to be offered</td>
  </tr>
  <tr>
	<td colspan="4"><?php echo $form->checkBox($b,'company_profile'); ?>Company Profile</td>
	 <td colspan="4"><?php echo $form->checkBox($b,'proof_financial_capability'); ?>Proof of Financial Capability</td>
    
  </tr>
  <tr>
    <td colspan="4"><?php echo $form->checkBox($b,'track_record'); ?>Information on track record(references)</td>
    <td colspan="4"><?php echo $form->checkBox($b,'costing_structure'); ?>Costing Structure</td>
    
  </tr>

  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="4"><?php echo $form->checkBox($b,'service_pricing'); ?>Service Pricing</td>
    
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="4"><?php echo $form->checkBox($b,'financial_statement'); ?>Projected financial statement, cash flow and balance</td>
  </tr>

  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="4"><?php echo $form->checkBox($b,'financing_plan'); ?>Financing plan</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="4"><?php echo $form->checkBox($b,'capital_investment'); ?>Capital Investment Ratio (Equity: Debt)</td>
  </tr>

  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="4"><?php echo $form->checkBox($b,'customer_care'); ?>Customer care strategy (quality of services)</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="4"><?php echo $form->checkBox($b,'human_resource'); ?>Human resource development strategy</td>
  </tr>
  </table>
  </fieldset>
<BR/>Nature of Services applied for:<BR/><?php echo $form->textArea($b,'nature',array('size'=>15,'maxlength'=>255)); ?><?php //if ($form->error($b,'nature')) ?><BR/>
<?php 
	if($a->licence_category_id==3){
		echo "<BR/>Category: ";
		$ms=LicenceSubCategory::model()->findAll(array('condition'=>'licence_category_id='.$a->licence_category_id));
			$mArray=array();
			$mArray['']='Select';
			foreach($ms as $m){
				$mArray[$m->id]=$m->name;
			}
			echo CHtml::dropDownList('LicenceApplication[licence_sub_category_id]',$a->licence_sub_category_id, $mArray,
				array(
						'ajax' => array(
								'type'=>'POST', //request type
								'url'=>Yii::app()->createUrl('licenceApplication/marketSegmentFilter2'), //url to call
								'update'=>'#LicenceApplication_market_segment_id', //selector to update
						)
				)
			
		);
		echo "<BR/>";
	}
?>
<BR/>Market&nbsp;Segment: 
<?php 
	if($a->licence_category_id==3)
		$ms=array();
	else
		$ms=MarketSegment::model()->findAll(array('condition'=>'licence_category_id='.$a->licence_category_id,'order'=>'order_code'));
		
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceApplication[market_segment_id]',$a->market_segment_id, $mArray);
?>
<BR/>




<BR/>The intended area to be covered by these services whether national, regional or district. (If region(s) or district(s) please mention):<BR/><?php echo $form->textArea($b,'area',array('size'=>15,'maxlength'=>50)); ?>

<BR/><BR/>Estimated Cost of investment<BR/>
<?php echo $form->textField($b,'estimated_cost',array('size'=>15,'maxlength'=>50)); ?>
<?php 
	$currencies=Currency::model()->findAll();
		$currencyArray=array();
		$currencyArray['']='Select';
		foreach($currencies as $currency){
			$currencyArray[$currency->id]=$currency->name;
		}
		echo CHtml::dropDownList('ApplicationCommunication[estimated_cost_currency]',$b->estimated_cost_currency, $currencyArray);
		echo $form->hiddenField($a,'licence_category_id');
?>
<BR/>Cost Description <BR/>
<?php echo $form->textArea($b,'estimated_cost_description',array('size'=>15,'maxlength'=>100)); ?>

<BR/><BR/>Does the applicant intend to use frequency spectrum<?php echo $form->radioButtonList($b,'use_frequency',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?>
<BR/><BR/>If yes, Is the network diagram attached ? <?php echo $form->radioButtonList($b,'network_diagram',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?>
<BR/><BR/>Does the applicant intend to use numbering resources<?php echo $form->radioButtonList($b,'use_numbering_resource',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?>
<BR/><BR/>If yes,enter the specified numbering resources ? 
<BR/>
<?php echo $form->textArea($b,'numbering_resource_description',array('size'=>15,'maxlength'=>50)); ?>
<BR/><BR/>Is Staff establishment and qualification (present and future) attached ?<?php echo $form->radioButtonList($b,'staff',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?>

<BR/><BR/>Is Staff training programmes attached ?<?php echo $form->radioButtonList($b,'staff_training',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?>
<BR/><BR/>Expected date of commencement of operations: <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[start_date]',
        'value'=>$a->start_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
<BR/><BR/>Future plans<BR><?php echo $form->textArea($b,'future_plans',array('size'=>15,'maxlength'=>50)); ?>
<BR/><BR/>Any other relevant information<BR><?php echo $form->textArea($a,'other_info',array('size'=>15,'maxlength'=>50)); ?>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Particulars of Authorised person who declared</strong></legend>
<table width='500'>
<tr><td>Name:</td><td><?php echo $form->textField($a,'signatory_name',array('size'=>15,'maxlength'=>50)); ?></td><td>Declare&nbsp;and&nbsp;Signed</td><td><?php echo $form->radioButtonList($b,'declared_signed',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?></td></tr>

<tr><td>Position:</td><td><?php echo $form->textField($a,'signatory_title',array('size'=>15,'maxlength'=>50)); ?></td><td>Date</td><td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[sign_date]',
        'value'=>$a->sign_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?></td></tr>
</table>
 </fieldset>
</td></tr>
<tr><td><input type='submit' name='save' value='Save Draft'>&nbsp;<input type='submit' name='retrieve' value='Retrieve Draft'>&nbsp;<input type='submit' name='insert' value='Submit'></td><td>&nbsp;</td></tr>
</table>
<?php $this->endWidget(); ?>
