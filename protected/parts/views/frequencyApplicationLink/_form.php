<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-link-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_application_id'); ?>
		<?php echo $form->textField($model,'frequency_application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_name'); ?>
		<?php echo $form->textField($model,'station_a_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'station_a_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_name'); ?>
		<?php echo $form->textField($model,'station_b_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'station_b_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_longitude'); ?>
		<?php echo $form->textField($model,'station_a_longitude'); ?>
		<?php echo $form->error($model,'station_a_longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_latitude'); ?>
		<?php echo $form->textField($model,'station_a_latitude'); ?>
		<?php echo $form->error($model,'station_a_latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_longitude'); ?>
		<?php echo $form->textField($model,'station_b_longitude'); ?>
		<?php echo $form->error($model,'station_b_longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_latitude'); ?>
		<?php echo $form->textField($model,'station_b_latitude'); ?>
		<?php echo $form->error($model,'station_b_latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_antenna_size'); ?>
		<?php echo $form->textField($model,'station_a_antenna_size'); ?>
		<?php echo $form->error($model,'station_a_antenna_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_antenna_size'); ?>
		<?php echo $form->textField($model,'station_b_antenna_size'); ?>
		<?php echo $form->error($model,'station_b_antenna_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_agl'); ?>
		<?php echo $form->textField($model,'station_a_agl'); ?>
		<?php echo $form->error($model,'station_a_agl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_agl'); ?>
		<?php echo $form->textField($model,'station_b_agl'); ?>
		<?php echo $form->error($model,'station_b_agl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_asl'); ?>
		<?php echo $form->textField($model,'station_a_asl'); ?>
		<?php echo $form->error($model,'station_a_asl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_asl'); ?>
		<?php echo $form->textField($model,'station_b_asl'); ?>
		<?php echo $form->error($model,'station_b_asl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'length'); ?>
		<?php echo $form->textField($model,'length'); ?>
		<?php echo $form->error($model,'length'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_antenna_type'); ?>
		<?php echo $form->textField($model,'station_a_antenna_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'station_a_antenna_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_antenna_type'); ?>
		<?php echo $form->textField($model,'station_b_antenna_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'station_b_antenna_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_antenna_gain'); ?>
		<?php echo $form->textField($model,'station_a_antenna_gain',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'station_a_antenna_gain'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_antenna_gain'); ?>
		<?php echo $form->textField($model,'station_b_antenna_gain',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'station_b_antenna_gain'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_power'); ?>
		<?php echo $form->textField($model,'station_a_power'); ?>
		<?php echo $form->error($model,'station_a_power'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_power'); ?>
		<?php echo $form->textField($model,'station_b_power'); ?>
		<?php echo $form->error($model,'station_b_power'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_effective_power'); ?>
		<?php echo $form->textField($model,'station_a_effective_power'); ?>
		<?php echo $form->error($model,'station_a_effective_power'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_effective_power'); ?>
		<?php echo $form->textField($model,'station_b_effective_power'); ?>
		<?php echo $form->error($model,'station_b_effective_power'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_beam_width'); ?>
		<?php echo $form->textField($model,'station_a_beam_width'); ?>
		<?php echo $form->error($model,'station_a_beam_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_beam_width'); ?>
		<?php echo $form->textField($model,'station_b_beam_width'); ?>
		<?php echo $form->error($model,'station_b_beam_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_polarization'); ?>
		<?php echo $form->textField($model,'station_a_polarization',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'station_a_polarization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_polarization'); ?>
		<?php echo $form->textField($model,'station_b_polarization',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'station_b_polarization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_azimuth'); ?>
		<?php echo $form->textField($model,'station_a_azimuth'); ?>
		<?php echo $form->error($model,'station_a_azimuth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_azimuth'); ?>
		<?php echo $form->textField($model,'station_b_azimuth'); ?>
		<?php echo $form->error($model,'station_b_azimuth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_channel_spacing'); ?>
		<?php echo $form->textField($model,'station_a_channel_spacing'); ?>
		<?php echo $form->error($model,'station_a_channel_spacing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_channel_spacing'); ?>
		<?php echo $form->textField($model,'station_b_channel_spacing'); ?>
		<?php echo $form->error($model,'station_b_channel_spacing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_tr_separation'); ?>
		<?php echo $form->textField($model,'station_a_tr_separation'); ?>
		<?php echo $form->error($model,'station_a_tr_separation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_tr_separation'); ?>
		<?php echo $form->textField($model,'station_b_tr_separation'); ?>
		<?php echo $form->error($model,'station_b_tr_separation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_tr_capacity'); ?>
		<?php echo $form->textField($model,'station_a_tr_capacity'); ?>
		<?php echo $form->error($model,'station_a_tr_capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_tr_capacity'); ?>
		<?php echo $form->textField($model,'station_b_tr_capacity'); ?>
		<?php echo $form->error($model,'station_b_tr_capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_a_channels'); ?>
		<?php echo $form->textField($model,'station_a_channels'); ?>
		<?php echo $form->error($model,'station_a_channels'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_b_channels'); ?>
		<?php echo $form->textField($model,'station_b_channels'); ?>
		<?php echo $form->error($model,'station_b_channels'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->