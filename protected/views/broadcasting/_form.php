<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_1'); ?>
		<?php echo $form->textField($model,'frequency_1',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'frequency_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_2'); ?>
		<?php echo $form->textField($model,'frequency_2',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'frequency_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_3'); ?>
		<?php echo $form->textField($model,'frequency_3',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'frequency_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_4'); ?>
		<?php echo $form->textField($model,'frequency_4',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'frequency_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_channel'); ?>
		<?php echo $form->textField($model,'number_channel'); ?>
		<?php echo $form->error($model,'number_channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_unit'); ?>
		<?php echo $form->textField($model,'frequency_unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_type_id'); ?>
		<?php echo $form->textField($model,'frequency_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_type_id'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_trans_id'); ?>
		<?php echo $form->textField($model,'frequency_trans_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'band'); ?>
		<?php echo $form->textField($model,'band',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'band'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'band_unit'); ?>
		<?php echo $form->textField($model,'band_unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'band_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'separation'); ?>
		<?php echo $form->textField($model,'separation',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'separation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'separation_unit'); ?>
		<?php echo $form->textField($model,'separation_unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'separation_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'channel_band_width'); ?>
		<?php echo $form->textField($model,'channel_band_width',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'channel_band_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'channel_band_width_unit'); ?>
		<?php echo $form->textField($model,'channel_band_width_unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'channel_band_width_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_band_width'); ?>
		<?php echo $form->textField($model,'frequency_band_width',array('size'=>38,'maxlength'=>38)); ?>
		<?php echo $form->error($model,'frequency_band_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_band_width_unit'); ?>
		<?php echo $form->textField($model,'frequency_band_width_unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_band_width_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direction'); ?>
		<?php echo $form->textField($model,'direction',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'direction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zone'); ?>
		<?php echo $form->textField($model,'zone'); ?>
		<?php echo $form->error($model,'zone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'point_a'); ?>
		<?php echo $form->textField($model,'point_a',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'point_a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'point_b'); ?>
		<?php echo $form->textField($model,'point_b',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'point_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'channel'); ?>
		<?php echo $form->textField($model,'channel'); ?>
		<?php echo $form->error($model,'channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id'); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_band_width'); ?>
		<?php echo $form->textField($model,'total_band_width',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_band_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'band_width_unit'); ?>
		<?php echo $form->textField($model,'band_width_unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'band_width_unit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->