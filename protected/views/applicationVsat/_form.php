<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-vsat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

  <p><?php echo $form->errorSummary($model); ?>  </p>
  <div class="row">
		<?php echo $form->labelEx($model,'application_type_id'); ?>
		<?php echo $form->textField($model,'application_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'application_type_id'); ?>
	</div>
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
        <td><fieldset><legend><strong>Test</strong></legend><table width="283" border="0">
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
        <td><fieldset><legend><strong></strong></legend><table width="200" border="0">
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
        <td><fieldset><legend><strong>siteData</strong></legend><table width="200" border="0">
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
        <td><fieldset><legend><strong></strong></legend><table width="200" border="0">
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
        <td>&nbsp;</td>
      </tr>
  </table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
