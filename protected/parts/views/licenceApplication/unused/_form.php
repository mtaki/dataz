<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'licence-application-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'application_date'); ?>
		<?php echo $form->textField($model,'application_date'); ?>
		<?php echo $form->error($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
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
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'licence_category_id'); ?>
		<?php echo $form->textField($model,'licence_category_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'licence_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_info'); ?>
		<?php echo $form->textField($model,'other_info',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'other_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'market_segment_id'); ?>
		<?php echo $form->textField($model,'market_segment_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'market_segment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'effective_date'); ?>
		<?php echo $form->textField($model,'effective_date'); ?>
		<?php echo $form->error($model,'effective_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num'); ?>
		<?php echo $form->textField($model,'num',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration',array('size'=>22,'maxlength'=>22)); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_licence'); ?>
		<?php echo $form->textField($model,'is_licence'); ?>
		<?php echo $form->error($model,'is_licence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_date'); ?>
		<?php echo $form->textField($model,'issue_date'); ?>
		<?php echo $form->error($model,'issue_date'); ?>
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
		<?php echo $form->labelEx($model,'publication_date'); ?>
		<?php echo $form->textField($model,'publication_date'); ?>
		<?php echo $form->error($model,'publication_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media'); ?>
		<?php echo $form->textField($model,'media',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'media'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_number'); ?>
		<?php echo $form->textField($model,'cp_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cp_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_issue_date'); ?>
		<?php echo $form->textField($model,'cp_issue_date',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cp_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_effective_date'); ?>
		<?php echo $form->textField($model,'cp_effective_date'); ?>
		<?php echo $form->error($model,'cp_effective_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_expiry_date'); ?>
		<?php echo $form->textField($model,'cp_expiry_date'); ?>
		<?php echo $form->error($model,'cp_expiry_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->