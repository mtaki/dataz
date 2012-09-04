<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vsat-operation-address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($oparationAddress); ?>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'operation_name'); ?>
		<?php echo $form->textField($oparationAddress,'operation_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($oparationAddress,'operation_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'phone_no'); ?>
		<?php echo $form->textField($oparationAddress,'phone_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($oparationAddress,'phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'operator_company_name'); ?>
		<?php echo $form->textField($oparationAddress,'operator_company_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($oparationAddress,'operator_company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'fax_no'); ?>
		<?php echo $form->textField($oparationAddress,'fax_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($oparationAddress,'fax_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'contry_of_registry'); ?>
		<?php echo $form->textField($oparationAddress,'contry_of_registry',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($oparationAddress,'contry_of_registry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'city_address'); ?>
		<?php echo $form->textField($oparationAddress,'city_address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($oparationAddress,'city_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'district'); ?>
		<?php echo $form->textField($oparationAddress,'district',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($oparationAddress,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($oparationAddress,'country'); ?>
		<?php echo $form->textField($oparationAddress,'country',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($oparationAddress,'country'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($oparationAddress->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
