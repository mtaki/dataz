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

<B><?php //echo $a->licenceCategory->name; ?></B>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  align="left">Applicant</td>
    <td  align="left">
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
    <input type="button" onclick="openOperator();" value='Update Applicant Details'></td>
   <td  align="left">Application&nbsp;Date</td>

    <td  align="left"><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[application_date]',
        'value'=>$a->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );?>
	

	</td>
  </tr>
</table>
  <table>
	<tr>
    <td valign="top">Sector applied for (Intracity and Intercity Courier operators)</td>
    </tr>
	<tr>
    <td valign="top"><?php echo $form->textArea($b,'sector',array('size'=>15,'maxlength'=>50)); ?></td>

    </tr>
  <tr>
    <td valign="top">Projection of quality of service standards</td>
    </tr>
   <tr>
    <td valign="top"><?php echo $form->textArea($b,'projection',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>

<tr>
    <td valign="top">Compensation and insurance policy</td>
   </tr>
   <tr>
    <td valign="top"><?php echo $form->textArea($b,'insurance_policy',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>

  <tr>
    <td valign="top">Track and trace system</td>  
      </tr>
      <?php
  	$m=MarketSegment::model()->find(array('condition'=>'licence_category_id='.$a->licence_category_id));
  	 echo $form->hiddenField($a,'market_segment_id',array('size'=>15,'maxlength'=>50,'value'=>$m->id)); 
  	 echo $form->hiddenField($a,'licence_category_id',array('value'=>$a->licence_category_id));
  ?>

   <tr>
     <td valign="top"><?php echo $form->textArea($b,'track_trace',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
</table>
<table>
<tr>
  	<td colspan='2'>Expected date of commencement of operations</td>
    <td colspan='1'><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
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

</td>
    
  </tr>

  </table>

<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Attachments</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td colspan="4"><?php echo $form->checkBox($b,'trade_licence'); ?>Valid Trade licence</td>
	<td colspan="4"><?php echo $form->checkBox($b,'business_name_registration'); ?>Company or Business Name Registration</td>
  </tr>

  <tr>
    <td colspan="4"><?php echo $form->checkBox($b,'tra_registered'); ?>VAT and Tax Registration</td>
	<td colspan="4">Receipt number <?php echo $form->textField($c,'num',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
	<tr>
    <td colspan="4"><?php echo $form->checkBox($b,'business_plan'); ?>Business plan</td>
	<td colspan="4">&nbsp;</td>

  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Particulars of authorised person who filled the form</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name</td>
    <td><?php echo $form->textField($a,'signatory_name',array('size'=>15,'maxlength'=>50)); ?></td>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Position</td>
    <td><?php echo $form->textField($a,'signatory_title',array('size'=>15,'maxlength'=>50)); ?></td>
    <td>Date</td>
    <td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[sign_date]',
        'value'=>$a->sign_date,
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </fieldset>




<input type='submit' name='save' value='Save Draft'>&nbsp;<input type='submit' name='retrieve' value='Retrieve Draft'>&nbsp;<input type='submit' name='insert' value='Submit'>


<?php $this->endWidget(); ?>
