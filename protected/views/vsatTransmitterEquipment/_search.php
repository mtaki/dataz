<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'application_vsat_id'); ?>
		<?php echo $form->textField($model,'application_vsat_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TCRAID'); ?>
		<?php echo $form->textField($model,'TCRAID',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_approval_number'); ?>
		<?php echo $form->textField($model,'type_approval_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manufacture_name'); ?>
		<?php echo $form->textField($model,'manufacture_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transmitter_power'); ?>
		<?php echo $form->textField($model,'transmitter_power',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'effective_radiated_power'); ?>
		<?php echo $form->textField($model,'effective_radiated_power',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'equipment_manual_attached'); ?>
		<?php echo $form->textField($model,'equipment_manual_attached',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'station_class'); ?>
		<?php echo $form->textField($model,'station_class',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remark'); ?>
		<?php echo $form->textField($model,'remark',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->