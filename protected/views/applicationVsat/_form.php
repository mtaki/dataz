<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-vsat-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>
    <?php
	echo $form->hiddenField($a,'licence_category_id',array('size'=>15,'maxlength'=>50,'value'=>$a->licence_category_id));
		
?>

 <fieldset>
 <legend><strong>A:Applicant Information</strong></legend> 
 <table width="200" border="0">
    <tr>
      <td>Applicant:</td>
      <td><?php 
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
    ?></td>
      <td><input name="button" type="button" onclick="openOperator();" value='Update Applicant ' /></td>
      <td>ApplicationDate:</td>
      <td><?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[application_date]',
        'value'=>$a->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                'htmlOptions'=>array('style'=>'width:100px'),
                ))
        );
?></td>
    </tr>
    <tr>
      <td><?php echo $form->labelEx($model,'application_type_id'); ?></td>
      <td><?php echo $form->dropdownList($model,'application_type_id',Chtml::listData(ApplicationType::model()->findAll(),'id','type_name'),array('style'=>'width:150px','empty'=>'Select type')); ?> <?php echo $form->error($model,'application_type_id'); ?></td>
      <td>Receipt Number</td>
      <td><?php echo $form->textField($c,'num',array('size'=>15,'maxlength'=>50)); ?></td>
      <td>&nbsp;</td>
    </tr>
  </table></fieldset>
  <tr>
<td  valign='top'><script type="text/javascript">

function openOperator() {
var url='';
url='<?php echo Yii::app()->createUrl('operator/edit'); ?>';
if(document.getElementById("LicenceApplication_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('LicenceApplication_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script></td>
<td  valign='top'></td>
</tr>
<tr><td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
 
	<table width="200" border="0">
      <tr>
        <td><table width="200" border="0">
            <tr>
              <td><span class="row"><?php echo $form->labelEx($model,'classification'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($model,'classification',array('size'=>20,'maxlength'=>50)); ?> <?php echo $form->error($model,'classification'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($model,'file_number'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($model,'file_number',array('size'=>20,'maxlength'=>30)); ?> <?php echo $form->error($model,'file_number'); ?></span></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><fieldset>
        <legend><strong>General info </strong></legend>
        <table width="283" border="0">
            <tr>
              <td ><span class="row"><?php echo $form->labelEx($model,'status_1'); ?></span></td>
              <td ><span class="row"><?php echo $form->textField($model,'status_1',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_1'); ?> </span></td>
              <td ><span class="row"><?php echo $form->textField($model,'status_2',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_2'); ?> </span></td>
              <td ><span class="row"><?php echo $form->textField($model,'status_3',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_3'); ?> </span></td>
              <td ><span class="row"><?php echo $form->textField($model,'status_4',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_4'); ?> </span></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($model,'status_date_1'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($model,'status_date_1',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_date_1'); ?> </span></td>
              <td><span class="row"><?php echo $form->textField($model,'status_date_2',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_date_2'); ?> </span></td>
              <td><span class="row"><?php echo $form->textField($model,'status_date_3',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_date_3'); ?> </span></td>
              <td><span class="row"><?php echo $form->textField($model,'status_date_4',array('size'=>15,'maxlength'=>50)); ?> <?php echo $form->error($model,'status_date_4'); ?></span></td>
            </tr>
        </table></fieldset></td>
      </tr>
      <tr>
        <td><fieldset><legend><strong>B:Operation Address</strong></legend><table width="200" border="0">
            <tr>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'operation_name'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'operation_name',array('size'=>20,'maxlength'=>100)); ?> <?php echo $form->error($oparationAddress,'operation_name'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'phone_no'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'phone_no',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($oparationAddress,'phone_no'); ?> </span></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'operator_company_name'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'operator_company_name',array('size'=>20,'maxlength'=>100)); ?> <?php echo $form->error($oparationAddress,'operator_company_name'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'fax_no'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'fax_no',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($oparationAddress,'fax_no'); ?> </span></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'contry_of_registry'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'contry_of_registry',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($oparationAddress,'contry_of_registry'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'city_address'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'city_address',array('size'=>20,'maxlength'=>100)); ?> <?php echo $form->error($oparationAddress,'city_address'); ?> </span></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'district'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'district',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($oparationAddress,'district'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($oparationAddress,'country'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($oparationAddress,'country',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($oparationAddress,'country'); ?> </span></td>
            </tr>
        </table></fieldset></td>
      </tr>
      <tr>
        <td><fieldset><legend><strong>C:Billing Address (if other than 1)</strong></legend><table width="200" border="0">
            <tr>
              <td><span class="row"><?php echo $form->labelEx($billingAddress,'name_of_accounting'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($billingAddress,'name_of_accounting',array('size'=>20,'maxlength'=>100)); ?> <?php echo $form->error($model,'name_of_accounting'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($billingAddress,'a_phone_no'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($billingAddress,'a_phone_no',array('size'=>12,'maxlength'=>20)); ?> <?php echo $form->error($model,'a_phone_no'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($billingAddress,'a_fax_no'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($billingAddress,'a_fax_no',array('size'=>12,'maxlength'=>20)); ?> <?php echo $form->error($model,'a_fax_no'); ?> </span></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($billingAddress,'name_of_sp'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($billingAddress,'name_of_sp',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($model,'name_of_sp'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($billingAddress,'sp_phone_no'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($billingAddress,'sp_phone_no',array('size'=>12,'maxlength'=>20)); ?> <?php echo $form->error($model,'sp_phone_no'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($billingAddress,'sp_fax_no'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($billingAddress,'sp_fax_no',array('size'=>12,'maxlength'=>20)); ?> <?php echo $form->error($model,'sp_fax_no'); ?></span></td>
            </tr>
        </table>
        </fieldset></td>
      </tr>
      <tr>
        <td><fieldset><legend><strong>Site Data (Location of the Earth Satelite)</strong></legend><table width="200" border="0">
            <tr>
              <td><span class="row"><?php echo $form->labelEx($siteData,'site_number'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($siteData,'site_number',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'site_number'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($siteData,'site_name'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($siteData,'site_name',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'site_name'); ?></span></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($siteData,'location_place_name'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($siteData,'location_place_name',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'location_place_name'); ?></span></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Location Cordinates </td>
              <td colspan="5"><table width="200" border="0">
                <tr>
                  <td>Longitude</td>
                  <td><span class="row"><?php echo $form->labelEx($siteData,'log_deg'); ?></span></td>
                  <td><span class="row"><?php echo $form->textField($siteData,'log_deg',array('size'=>5,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'log_deg'); ?></span></td>
                  <td><span class="row"><?php echo $form->labelEx($siteData,'log_min'); ?></span></td>
                  <td><span class="row"><?php echo $form->textField($siteData,'log_min',array('size'=>5,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'log_min'); ?> </span></td>
                  <td><span class="row"><?php echo $form->labelEx($siteData,'log_secs'); ?></span></td>
                  <td><span class="row"><?php echo $form->textField($siteData,'log_secs',array('size'=>5,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'log_secs'); ?> </span></td>
                </tr>
                <tr>
                  <td>latitude</td>
                  <td><span class="row"><?php echo $form->labelEx($siteData,'lat_deg'); ?></span></td>
                  <td><span class="row"><?php echo $form->textField($siteData,'lat_deg',array('size'=>5,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'lat_deg'); ?></span></td>
                  <td><span class="row"><?php echo $form->labelEx($siteData,'lat_min'); ?></span></td>
                  <td><span class="row"><?php echo $form->textField($siteData,'lat_min',array('size'=>5,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'lat_min'); ?> </span></td>
                  <td><span class="row"><?php echo $form->labelEx($siteData,'lat_secs'); ?></span></td>
                  <td><span class="row"><?php echo $form->textField($siteData,'lat_secs',array('size'=>5,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'lat_secs'); ?></span></td>
                </tr>
              </table></fieldset></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($siteData,'region'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($siteData,'region',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'region'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($siteData,'site_elevation'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($siteData,'site_elevation',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($siteData,'site_elevation'); ?> </span></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($siteData,'remark'); ?></span></td>
              <td><span class="row"><?php echo $form->textArea($siteData,'remark',array('rows'=>6, 'cols'=>50)); ?> <?php echo $form->error($siteData,'remark'); ?> </span></td>
              <td colspan="4">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td><fieldset><legend><strong>Frequency Data</strong></legend><table width="200" border="0">
            <tr>
              <td width="18"><span class="row"><?php echo $form->labelEx($frequencyData,'frequency_band'); ?></span></td>
              <td width="35"><span class="row"><?php echo $form->textField($frequencyData,'frequency_band',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($frequencyData,'frequency_band'); ?></span></td>
              <td width="20"><span class="row"><?php echo $form->labelEx($frequencyData,'date_of_issue'); ?></span></td>
              <td width="33"><span class="row"><?php echo $form->textField($frequencyData,'date_of_issue',array('size'=>10,'maxlength'=>50)); ?> <?php echo $form->error($frequencyData,'date_of_issue'); ?> </span></td>
              <td width="18"><span class="row"><?php echo $form->labelEx($frequencyData,'date_of_renewal'); ?></span></td>
              <td width="36"><span class="row"><?php echo $form->textField($frequencyData,'date_of_renewal',array('size'=>10,'maxlength'=>50)); ?> <?php echo $form->error($frequencyData,'date_of_renewal'); ?> </span></td>
            </tr>
            <tr>
              <td><span class="row"><?php echo $form->labelEx($frequencyData,'emission'); ?></span></td>
              <td><span class="row"><?php echo $form->textField($frequencyData,'emission',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($frequencyData,'emission'); ?> </span></td>
              <td><span class="row"><?php echo $form->labelEx($frequencyData,'tolerance'); ?></span></td>
              <td colspan="3"><span class="row"><?php echo $form->textField($frequencyData,'tolerance',array('size'=>20,'maxlength'=>20)); ?> <?php echo $form->error($frequencyData,'tolerance'); ?> </span></td>
            </tr>
        </table></fieldset></td>
      </tr>
      <tr>
        <td><fieldset><legend><strong>Client Declaration
</strong></legend><table width='500'>
<tr><td>Name:</td><td><?php echo $form->textField($a,'signatory_name',array('size'=>15,'maxlength'=>50)); ?></td><td>Declare&nbsp;and&nbsp;Signed</td><td><?php //echo $form->radioButtonList($b,'declared_signed',array('1'=>'Yes','2'=>'No'),array('separator'=>'&nbsp;'));?></td></tr>

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
</table></fieldset></td>
      </tr>
  </table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
