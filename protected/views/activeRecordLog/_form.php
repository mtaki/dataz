<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'active-record-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'table'); ?>
		<?php echo $form->textField($model,'table',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'table'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'table_id'); ?>
		<?php echo $form->textField($model,'table_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creationdate'); ?>
		<?php echo $form->textField($model,'creationdate'); ?>
		<?php echo $form->error($model,'creationdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'old_values'); ?>
		<?php echo $form->textArea($model,'old_values',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'old_values'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_values'); ?>
		<?php echo $form->textArea($model,'new_values',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'new_values'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->