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
    <td width="600">Applicant</td>
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
  <?php
  	$m=MarketSegment::model()->find(array('condition'=>'licence_category_id='.$a->licence_category_id));
  	 echo $form->hiddenField($a,'market_segment_id',array('size'=>15,'maxlength'=>50,'value'=>$m->id)); 
  ?>
  
  <tr>

  	<td >APPLICATION&nbsp;DATE</td>
    <td >
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
<legend><strong>Give brief description of equipment to be sold:


</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'type_make',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Indicate the area you intend to sell the equipment whether
National, Regional or District

</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'area',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
  <fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>How will you procure the equipment?


</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php echo $form->textArea($b,'how_procure',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>If your business is an existing one, how many years has it been
operating?
</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td valign="top"><?php echo $form->textArea($b,'existing_business',array('size'=>15,'maxlength'=>50)); ?></td>
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
<tr><td><input type='submit' name='save' value='Save Draft'>&nbsp;<input type='submit' name='retrieve' value='Retrieve Draft'>&nbsp;<input type='submit' name='insert' value='Submit'></td><td>&nbsp;</td></tr>
</table>


<?php $this->endWidget(); ?>
