<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-vsat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'file_number'); ?>
		<?php echo $form->textField($model,'file_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'file_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'classification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_1'); ?>
		<?php echo $form->textField($model,'status_1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_2'); ?>
		<?php echo $form->textField($model,'status_2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_3'); ?>
		<?php echo $form->textField($model,'status_3',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_4'); ?>
		<?php echo $form->textField($model,'status_4',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_date_1'); ?>
		<?php echo $form->textField($model,'status_date_1'); ?>
		<?php echo $form->error($model,'status_date_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_date_2'); ?>
		<?php echo $form->textField($model,'status_date_2'); ?>
		<?php echo $form->error($model,'status_date_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_date_3'); ?>
		<?php echo $form->textField($model,'status_date_3'); ?>
		<?php echo $form->error($model,'status_date_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_date_4'); ?>
		<?php echo $form->textField($model,'status_date_4'); ?>
		<?php echo $form->error($model,'status_date_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'application_type_id'); ?>
		<?php echo $form->textField($model,'application_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'application_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->