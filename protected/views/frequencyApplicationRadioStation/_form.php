<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-radio-station-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'application_id'); ?>
		<?php echo $form->textField($model,'application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'index'); ?>
		<?php echo $form->textField($model,'index',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'index'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exact_antenna_site'); ?>
		<?php echo $form->textField($model,'exact_antenna_site',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'exact_antenna_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'make'); ?>
		<?php echo $form->textField($model,'make',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'make'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'call_sign'); ?>
		<?php echo $form->textField($model,'call_sign',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'call_sign'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'antenna_type'); ?>
		<?php echo $form->textField($model,'antenna_type',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'antenna_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->