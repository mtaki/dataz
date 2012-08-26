<?php
/*$this->breadcrumbs=array(
	'Licence Applications'=>array('admin'),
	'New Licence Application',
);*/

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Manage LicenceApplication', 'url'=>array('admin')),
);
?>

<h1>Create Licence Application</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'method'=>'post',
)); ?>
<?php echo CHtml::errorSummary(array($a,$b,$d)); ?>
<?php
	echo $form->hiddenField($a,'licence_category_id',array('size'=>15,'maxlength'=>50,'value'=>$a->licence_category_id));	
?>


<B><?php echo $a->licenceCategory->name; ?></B><BR/>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'FORM FSA')); ?>
<table>
<tr>
<td colspan='2'>
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
 			 'value'=>$a->operator->name,
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
</td><td  valign='top'>Application&nbsp;Date: <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[application_date]',
        'value'=>$a->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?></td>
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
</td>
	
    
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
	
?>
<BR/>Market&nbsp;Segment: 
<?php 
	if (!empty($a->licence_sub_category_id))
		$ms=MarketSegment::model()->findAll(array('condition'=>'licence_sub_category_id='.$a->licence_sub_category_id,'order'=>'order_code'));
	else
		$ms=array();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceApplication[market_segment_id]',$a->market_segment_id, $mArray);
?>
<BR/>
<BR/>Business&nbsp;Category: 
<?php 
	
		
		$mArray=array();
		$mArray['']='Select';
		$mArray['Public']='Public';
		$mArray['Commercial']='Commercial';
		$mArray['Non-Commerial']='Non-Commerial';
		$mArray['Community']='Community';
		echo CHtml::dropDownList('LicenceApplication[business_category]',$a->business_category, $mArray);
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
<tr><td></td><td>&nbsp;</td></tr>
</table>

<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'FORM CS')); ?>
<B>A. APPLICANT INFORMATION:</B> 
<table>
<tr><td>Service to be Licensed:</td><td>
<?php
$ms=ContentService::model()->findAll(array('order'=>'id'));
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('ApplicationContent[service_id]',$d->service_id, $mArray);
?>
</td></tr>

<tr><td>Any Other Service:</td><td><?php echo $form->textField($d,'other_service',array('size'=>15,'maxlength'=>50)); ?></td></tr>
</table>
<B>B. TECHNICAL SPECIFICATIONS:</B> <BR/>
Make and Type of Trasmitter: <?php echo $form->textField($d,'make_type',array('size'=>15,'maxlength'=>50)); ?><BR/>
Manufacturer Name and Address<BR/><?php echo $form->textArea($d,'manufacture_name_address',array('size'=>15,'maxlength'=>50)); ?><BR/>
Station Type: <?php
$ms=ContentStationType::model()->findAll(array('order'=>'id'));
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('ApplicationContent[station_type]',$d->station_type, $mArray);
?><BR/><BR/>
Intended Coverage Area: <?php echo $form->textField($d,'coverage_area',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>

<?php echo $form->checkBox($d,'use_tvro'); ?>Do you intend to use TVRO? <BR/><BR/>
If yes, to which Satellite is the TVRO intended to be beamed?<BR/>
Name of the Organization and the Satellite Information<BR/><?php echo $form->textArea($d,'tvro_satellite',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>
For Cable Television, give particulars of Equipment<BR/><?php echo $form->textArea($d,'cable_television',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>
For Free To Air Broadcasting give particulars of Studio Equipment<BR/><?php echo $form->textArea($d,'free_to_air',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>
<B>C. TRANSMISSION INFORMATION:</B> <BR/>
Exact Studio Site Location (Area, Street, Block, Plot No.etc)<BR/><?php echo $form->textArea($d,'studio_site',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>

Exact Antenna (Broadcasting) Site Location (Area, Street, Block, Plot No.etc)<BR/><?php echo $form->textArea($d,'antenna_site',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>
Leased Facility: <?php echo $form->textField($d,'leased_facility',array('size'=>15,'maxlength'=>50)); ?> Own Property: <?php echo $form->textField($d,'owner_property',array('size'=>15,'maxlength'=>50)); ?><BR/><BR/>
If leased, Name of lessor: <?php echo $form->textField($d,'name_lessor',array('size'=>15,'maxlength'=>50)); ?><BR/>
Address and Contact<BR/> <?php echo $form->textArea($d,'lessor_address_contact',array('size'=>15,'maxlength'=>50)); ?><BR/>
<table>
<tr><td>Antenna Gain:</td><td><?php echo $form->textField($d,'antenna_gain',array('size'=>15,'maxlength'=>50)); ?> dBi</td></tr>

<tr><td>Polarization:</td><td><?php echo $form->textField($d,'polarization',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Antenna Site</td><td>&nbsp;</td></tr>
<tr><td>Elevation Above Sea Level(Meters):</td><td><?php echo $form->textField($d,'elevation',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Height Above Ground Level(Meters):</td><td><?php echo $form->textField($d,'height',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td colspan=2>Antenna Coordinates (Latitude/Longitude)<BR/> <?php echo $form->textField($d,'antenna_coordinates',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Frequency Band:</td><td><?php echo $form->textField($d,'frequency_band',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Preferred Frequency Channel:</td><td><?php echo $form->textField($d,'frequency_channel',array('size'=>15,'maxlength'=>50)); ?></td></tr>
</table>

<table>
<tr><td>Nominal Bandwidth</td><td><?php echo $form->textField($d,'nominal_band_width',array('size'=>15,'maxlength'=>50)); ?></td><td>Type of Modulation</td><td><?php echo $form->textField($d,'modulation_type',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Class of Emission</td><td><?php echo $form->textField($d,'emission_class',array('size'=>15,'maxlength'=>50)); ?></td><td>Transmitter Power(Watts)</td><td><?php echo $form->textField($d,'transmitter_power',array('size'=>15,'maxlength'=>50)); ?></td></tr>
</table>
<table>
<tr><td>Azimuth of Maximum Radiation in Degrees:</td><td><?php echo $form->textField($d,'azimuth',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Angular Width of Radiation Main Lobe in Degrees:</td><td><?php echo $form->textField($d,'angular_width',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Maximum Hours of Operation:</td><td><?php echo $form->textField($d,'operation_hours',array('size'=>15,'maxlength'=>50)); ?></td></tr>
</table>
<B>D. STL INFORMATION:</B> <BR/>

<table>
<tr><td>Make and Type of Equipment:</td><td><?php echo $form->textField($d,'stl_equipment_make',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td colspan='2'>Manufacture's Name and Address<BR/><?php echo $form->textArea($d,'stl_equipment_manufacturer',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Antenna Type and Make:</td><td><?php echo $form->textField($d,'stl_antenna',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Maximum Operating Power:</td><td><?php echo $form->textField($d,'stl_operating_power',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Any other Remarks:</td><td><?php echo $form->textField($d,'stl_remarks',array('size'=>15,'maxlength'=>50)); ?></td></tr>
</table>
<B>E. ANTENNA MAST CONSTRUCTION:</B> <BR/>
<table>

<tr><td>Contractor's Name:</td><td><?php echo $form->textField($d,'antenna_contractor_name',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td colspan='2'>Contractor Address<BR/><?php echo $form->textArea($d,'antenna_contractor_address',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Phone Number:</td><td><?php echo $form->textField($d,'antenna_contracor_phone',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Fax Number:</td><td><?php echo $form->textField($d,'antenna_contracor_fax',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>E-mail Address:</td><td><?php echo $form->textField($d,'antenna_contractor_email',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>CRB Registration Number:</td><td><?php echo $form->textField($d,'crb_number',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>CRB Registration Category:</td><td>

<?php

		$nArray=array();
		$nArray['']='Select';
		$nArray['Local']='Local';
		$nArray['Foreign']='Foreign';
		foreach($ms as $m){
			$nArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('ApplicationContent[crb_category]',$d->crb_category, $nArray);
?>

</td></tr>

</table>
<B>F. CONTENT INFORMATION:</B> <BR/>
<table>
<tr><td>Source of Programmes:</td><td><?php echo $form->textField($d,'content_source',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>If imported please specify:</td><td><?php echo $form->textField($d,'content_import',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Type of Programmes:</td><td><?php echo $form->textArea($d,'content_type_program',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Time and Hours of Operation per day:</td><td><?php echo $form->textField($d,'content_time_hours',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Intended Charges to Viewers and Listeners:</td><td><?php echo $form->textField($d,'content_intended_charges',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td>Expected Date of Commencement of Operations:</td><td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'ApplicationContent[content_date_commencement]',
        'value'=>$d->declaration_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>

</td></tr>

<tr><td colspan='2'>Future Plans:<BR/><?php echo $form->textArea($d,'content_future_plans',array('size'=>15,'maxlength'=>50)); ?></td></tr>
<tr><td colspan='2'>Any Other Relevant Information:<BR/><?php echo $form->textArea($d,'content_other_info',array('size'=>15,'maxlength'=>50)); ?></td></tr>
</table>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Particulars of Authorised person who declared the CS form</strong></legend>
<table width='500'>
<tr><td>Name:</td><td><?php echo $form->textField($d,'declaration_name',array('size'=>15,'maxlength'=>50)); ?></td><td></td><td></td></tr>
<tr><td>Place:</td><td><?php echo $form->textField($d,'declaration_place',array('size'=>15,'maxlength'=>50)); ?></td><td>Date</td><td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'ApplicationContent[declaration_date]',
        'value'=>$d->declaration_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>


</td></tr>
</table>

 </fieldset>


<?php $this->endWidget(); ?>

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
<?php

$s= "
<script type=\"text/javascript\" >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '".Yii::app()->createUrl('site/upload')."',
			name: 'uploadfile',
			data:{entity_id : '$a->id',module : 'licence_application',action_stage : 'Edit'},
			onSubmit: function(file, ext){
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				status.text('');
				if(response===\"success\"){
					$('<li></li>').appendTo('#files').html(''+file).addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>
<div id=\"upload\" ><span>Upload Documents<span></div><span id=\"status\" ></span>
<ul id=\"files\"></ul>";
echo $s;
?>
<input type='submit' name='save' value='Save'>
<?php $this->endWidget(); ?>
