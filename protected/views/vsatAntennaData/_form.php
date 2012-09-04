<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vsat-antenna-data-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($antennaData); ?>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'TCRAID'); ?>
		<?php echo $form->textField($antennaData,'TCRAID',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'TCRAID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'manufacture_name'); ?>
		<?php echo $form->textField($antennaData,'manufacture_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'manufacture_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'antennaData'); ?>
		<?php echo $form->textField($antennaData,'antennaData',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'antennaData'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'height_above_ground'); ?>
		<?php echo $form->textField($antennaData,'height_above_ground',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'height_above_ground'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'polarization'); ?>
		<?php echo $form->textField($antennaData,'polarization',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'polarization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'directional'); ?>
		<?php echo $form->textField($antennaData,'directional',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'directional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'circular'); ?>
		<?php echo $form->textField($antennaData,'circular',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($antennaData,'circular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($antennaData,'other'); ?>
		<?php echo $form->textField($antennaData,'other',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($antennaData,'other'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($antennaData->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
