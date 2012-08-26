<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-resource-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'num'); ?>
		<?php echo $form->textField($model,'num',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'num'); ?>
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
		<?php echo $form->labelEx($model,'application_id'); ?>
		<?php echo $form->textField($model,'application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_type'); ?>
		<?php echo $form->textField($model,'request_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'request_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->