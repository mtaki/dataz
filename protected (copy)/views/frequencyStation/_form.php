<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-station-form',
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
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'district_id'); ?>
		<?php echo $form->textField($model,'district_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'district_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_type_id'); ?>
		<?php echo $form->textField($model,'station_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'station_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'station_sub_type_id'); ?>
		<?php echo $form->textField($model,'station_sub_type_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'station_sub_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(array('name'=>$model->isNewRecord ? 'Create' : 'Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->