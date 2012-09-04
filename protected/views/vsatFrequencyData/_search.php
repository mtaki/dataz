<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'frequency_band'); ?>
		<?php echo $form->textField($model,'frequency_band',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_issue'); ?>
		<?php echo $form->textField($model,'date_of_issue'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_renewal'); ?>
		<?php echo $form->textField($model,'date_of_renewal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emission'); ?>
		<?php echo $form->textField($model,'emission',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tolerance'); ?>
		<?php echo $form->textField($model,'tolerance',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_vsat_id'); ?>
		<?php echo $form->textField($model,'application_vsat_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->