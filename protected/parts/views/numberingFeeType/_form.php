<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-fee-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numbering_resource_type_id'); ?>
		<?php echo $form->textField($model,'numbering_resource_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numbering_resource_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->