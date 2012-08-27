<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vsat-operation-address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'operation_name'); ?>
		<?php echo $form->textField($model,'operation_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'operation_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_no'); ?>
		<?php echo $form->textField($model,'phone_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_company_name'); ?>
		<?php echo $form->textField($model,'operator_company_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'operator_company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax_no'); ?>
		<?php echo $form->textField($model,'fax_no',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fax_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contry_of_registry'); ?>
		<?php echo $form->textField($model,'contry_of_registry',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contry_of_registry'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_address'); ?>
		<?php echo $form->textField($model,'city_address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district'); ?>
		<?php echo $form->textField($model,'district',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->