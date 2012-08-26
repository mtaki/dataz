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

<h1><?php echo $a->licenceCategory->name; ?> &nbsp;Licence Application</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php echo CHtml::errorSummary(array($a,$b,$c)); ?>
<?php
	echo $form->hiddenField($a,'licence_category_id',array('size'=>15,'maxlength'=>50,'value'=>$a->licence_category_id));
		
?>
<table>
<tr><td colspan='2'><fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>General Information</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="600">APPLICANT</td>
    <td width="600">
<?php 
echo CHtml::hiddenField('LicenceApplication[operator_id]');
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
    <td width="600">Application No</td>

    <td width="600"><?php echo $form->textField($b,'application_number',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  <tr>
    <td width="600">TYPE</td>
    <td width="600">
    <?php 

	$ms=MarketSegment::model()->findAll(array('condition'=>'licence_category_id='.$a->licence_category_id,'order'=>'order_code'));
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceApplication[market_segment_id]','', $mArray);
?>
    </td>
    <td width="600"></td>
    <td width="600"></td>

  </tr>
  
  <tr>
  	<td>APPLICATION&nbsp;DATE</td>
    <td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>

  </table>
  </fieldset>
  
  <fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Application Fee Receipt</strong></legend>

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width='25%'>NUMBER</td>
    <td width='25%'><?php echo $form->textField($c,'num',array('size'=>15,'maxlength'=>50)); ?></td>
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
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Type and Make of Equipment Intended for Installation/Maintenance</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'type_make',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>

  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Give brief description of activities you wish to undertake</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'activities',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>If you intend to carry out installation, how do you procure the equipment</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'how_procure_equipment',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Indicate investment costs of business</strong></legend>

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textField($b,'investiment_cost',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Number of qualified technical staff and their qualifications</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td valign="top"><?php echo $form->textArea($b,'staff',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Number of other qualified supporting staffs and their qualifications</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'support_staff',array('size'=>15,'maxlength'=>50)); ?></td>

  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Office Information</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">Do you possess any office?</td><td><?php echo $form->checkBox($b,'possess_office'); ?></td>
  </tr>

  <tr>
    <td valign="top">If yes, give size and location</td> <td valign="top"><?php echo $form->textArea($b,'office_description',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Workshop Information</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td valign="top">Do you possess any workshop?</td><td><?php echo $form->checkBox($b,'possess_workshop'); ?></td>
  </tr>
  <tr>
    <td valign="top">If yes, give size and location</td> <td valign="top"><?php echo $form->textArea($b,'workshop_description',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>

  </fieldset>
  <fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Bussness Registration Information</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td valign="top">Is your Bussiness registered by Engineer Registration Board?</td><td><?php echo $form->checkBox($b,'board_registration'); ?></td>
  </tr>
  <tr>
    <td valign="top">If yes, attach relevant document</td> <td valign="top"><?php echo $form->fileField($b,'registration_doc',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>

  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Vehicle Information</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">Do you possess any vehicle for your business?</td><td><?php echo $form->checkBox($b,'possess_vehicle'); ?></td>
  </tr>
  <tr>
    <td valign="top">If yes, how many?</td> <td valign="top"><?php echo $form->textField($b,'vehicle_how_many',array('size'=>15,'maxlength'=>50)); ?></td>

  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>State other means of Transport</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'other_transport',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>

  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>What equipment (tools) and test gears do you have?</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'test_gears',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>

  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>What is your source of spares?</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'source_spares',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>If you are already licensed, give particulars of previous license</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'previous_licence',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Client Declaration</strong></legend>

<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>SIGNATORY&nbsp;NAME</td>
    <td><?php echo $form->textField($a,'signatory_name',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>TITLE</td>
    <td><?php echo $form->textField($a,'signatory_title',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  <tr>

    <td>DATE OF SIGNING</td>
    <td>
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
?>
    </td>
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
  </fieldset>

</td></tr>
<tr><td><input type='submit' name='save' value='Save'>&nbsp;<input type='submit' name='retrieve' value='Retrieve'>&nbsp;<input type='submit' name='insert' value='Submit'></td><td>&nbsp;</td></tr>
</table>


<?php $this->endWidget(); ?>
