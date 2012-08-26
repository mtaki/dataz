<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-station-sub-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_type_id'); ?>
		<?php echo $form->textField($model,'station_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'station_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fee'); ?>
		<?php echo $form->textField($model,'fee',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fee_currency'); ?>
		<?php echo $form->textField($model,'fee_currency',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fee_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formula'); ?>
		<?php echo $form->textField($model,'formula',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'formula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grouped'); ?>
		<?php echo $form->textField($model,'grouped'); ?>
		<?php echo $form->error($model,'grouped'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->