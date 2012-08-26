<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'broadcasting-transmitter-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annual_fee'); ?>
		<?php echo $form->textField($model,'annual_fee'); ?>
		<?php echo $form->error($model,'annual_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annual_fee_currency_id'); ?>
		<?php echo $form->textField($model,'annual_fee_currency_id'); ?>
		<?php echo $form->error($model,'annual_fee_currency_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->