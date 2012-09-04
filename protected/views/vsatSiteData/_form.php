<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vsat-site-data-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($siteData); ?>

	<div class="row">
		<?php echo $form->labelEx($siteData,'site_number'); ?>
		<?php echo $form->textField($siteData,'site_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'site_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'site_name'); ?>
		<?php echo $form->textField($siteData,'site_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'site_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'location_place_name'); ?>
		<?php echo $form->textField($siteData,'location_place_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'location_place_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'log_deg'); ?>
		<?php echo $form->textField($siteData,'log_deg',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'log_deg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'log_min'); ?>
		<?php echo $form->textField($siteData,'log_min',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'log_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'log_secs'); ?>
		<?php echo $form->textField($siteData,'log_secs',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'log_secs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'lat_deg'); ?>
		<?php echo $form->textField($siteData,'lat_deg',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'lat_deg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'lat_min'); ?>
		<?php echo $form->textField($siteData,'lat_min',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'lat_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'lat_secs'); ?>
		<?php echo $form->textField($siteData,'lat_secs',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'lat_secs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'region'); ?>
		<?php echo $form->textField($siteData,'region',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'site_elevation'); ?>
		<?php echo $form->textField($siteData,'site_elevation',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($siteData,'site_elevation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($siteData,'remark'); ?>
		<?php echo $form->textArea($siteData,'remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($siteData,'remark'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($siteData->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
