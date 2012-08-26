<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-fee-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numbering_fee_type_id'); ?>
		<?php echo $form->textField($model,'numbering_fee_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numbering_fee_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_fee'); ?>
		<?php echo $form->textField($model,'registration_fee',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'registration_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_fee_currency_id'); ?>
		<?php echo $form->textField($model,'registration_fee_currency_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'registration_fee_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annual_fee'); ?>
		<?php echo $form->textField($model,'annual_fee',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'annual_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'annual_fee_currency_id'); ?>
		<?php echo $form->textField($model,'annual_fee_currency_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'annual_fee_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscriber_fee'); ?>
		<?php echo $form->textField($model,'subscriber_fee',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'subscriber_fee'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->