<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-equipment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'application_id'); ?>
		<?php echo $form->textField($model,'application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_service'); ?>
		<?php echo $form->textField($model,'type_service',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'type_service'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_radio'); ?>
		<?php echo $form->textField($model,'type_radio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type_radio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'power'); ?>
		<?php echo $form->textField($model,'power'); ?>
		<?php echo $form->error($model,'power'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->