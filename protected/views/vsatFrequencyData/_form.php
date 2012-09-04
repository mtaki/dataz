<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vsat-frequency-data-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($frequencyData); ?>

	<div class="row">
		<?php echo $form->labelEx($frequencyData,'frequency_band'); ?>
		<?php echo $form->textField($frequencyData,'frequency_band',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($frequencyData,'frequency_band'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyData,'date_of_issue'); ?>
		<?php echo $form->textField($frequencyData,'date_of_issue'); ?>
		<?php echo $form->error($frequencyData,'date_of_issue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyData,'date_of_renewal'); ?>
		<?php echo $form->textField($frequencyData,'date_of_renewal'); ?>
		<?php echo $form->error($frequencyData,'date_of_renewal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyData,'emission'); ?>
		<?php echo $form->textField($frequencyData,'emission',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($frequencyData,'emission'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($frequencyData,'tolerance'); ?>
		<?php echo $form->textField($frequencyData,'tolerance',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($frequencyData,'tolerance'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($frequencyData->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
