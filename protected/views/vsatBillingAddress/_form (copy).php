<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vsat-billing-address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($billingAddress); ?>

	<div class="row">
		<?php echo $form->labelEx($billingAddress,'name_of_accounting'); ?>
		<?php echo $form->textField($billingAddress,'name_of_accounting',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($billingAddress,'name_of_accounting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($billingAddress,'a_phone_no'); ?>
		<?php echo $form->textField($billingAddress,'a_phone_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($billingAddress,'a_phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($billingAddress,'a_fax_no'); ?>
		<?php echo $form->textField($billingAddress,'a_fax_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($billingAddress,'a_fax_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($billingAddress,'name_of_sp'); ?>
		<?php echo $form->textField($billingAddress,'name_of_sp',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($billingAddress,'name_of_sp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($billingAddress,'sp_phone_no'); ?>
		<?php echo $form->textField($billingAddress,'sp_phone_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($billingAddress,'sp_phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($billingAddress,'sp_fax_no'); ?>
		<?php echo $form->textField($billingAddress,'sp_fax_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($billingAddress,'sp_fax_no'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($billingAddress->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
