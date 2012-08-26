<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-application-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'purpose'); ?>
		<?php echo $form->textField($model,'purpose',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'purpose'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'effective_date'); ?>
		<?php echo $form->textField($model,'effective_date'); ?>
		<?php echo $form->error($model,'effective_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operation_start_date'); ?>
		<?php echo $form->textField($model,'operation_start_date'); ?>
		<?php echo $form->error($model,'operation_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_info'); ?>
		<?php echo $form->textField($model,'other_info',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'other_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'signatory_name'); ?>
		<?php echo $form->textField($model,'signatory_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'signatory_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'signatory_title'); ?>
		<?php echo $form->textField($model,'signatory_title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'signatory_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_date'); ?>
		<?php echo $form->textField($model,'sign_date'); ?>
		<?php echo $form->error($model,'sign_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_location'); ?>
		<?php echo $form->textField($model,'sign_location',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sign_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'forecast'); ?>
		<?php echo $form->textField($model,'forecast',array('size'=>22,'maxlength'=>22)); ?>
		<?php echo $form->error($model,'forecast'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numbering_resource_type_id'); ?>
		<?php echo $form->textField($model,'numbering_resource_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numbering_resource_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_date'); ?>
		<?php echo $form->textField($model,'application_date'); ?>
		<?php echo $form->error($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_licence_number'); ?>
		<?php echo $form->textField($model,'service_licence_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'service_licence_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numbering_fee_type_id'); ?>
		<?php echo $form->textField($model,'numbering_fee_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numbering_fee_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dispatch_name'); ?>
		<?php echo $form->textField($model,'dispatch_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'dispatch_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dispatch_title'); ?>
		<?php echo $form->textField($model,'dispatch_title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'dispatch_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numbers_in_use'); ?>
		<?php echo $form->textField($model,'numbers_in_use',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'numbers_in_use'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numbers_reserved'); ?>
		<?php echo $form->textField($model,'numbers_reserved',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'numbers_reserved'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'areas'); ?>
		<?php echo $form->textField($model,'areas',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'areas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interconnection'); ?>
		<?php echo $form->textField($model,'interconnection',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'interconnection'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'services'); ?>
		<?php echo $form->textField($model,'services',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'services'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_existing_numbers'); ?>
		<?php echo $form->textField($model,'status_existing_numbers',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'status_existing_numbers'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->