<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-radio-station-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($frequencyApplicationRadioStation); ?>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'application_id'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'index'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'index',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'index'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'exact_antenna_site'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'exact_antenna_site',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'exact_antenna_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'location'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'location',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'make'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'make',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'make'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'call_sign'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'call_sign',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'call_sign'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'antenna_type'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'antenna_type',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'antenna_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'longitude'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'longitude'); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyApplicationRadioStation,'latitude'); ?>
		<?php echo $form->textField($frequencyApplicationRadioStation,'latitude'); ?>
		<?php echo $form->error($frequencyApplicationRadioStation,'latitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($frequencyApplicationRadioStation->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->