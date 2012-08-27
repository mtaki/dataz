<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name_of_accounting'); ?>
		<?php echo $form->textField($model,'name_of_accounting',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_phone_no'); ?>
		<?php echo $form->textField($model,'a_phone_no',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_fax_no'); ?>
		<?php echo $form->textField($model,'a_fax_no',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_of_sp'); ?>
		<?php echo $form->textField($model,'name_of_sp',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sp_phone_no'); ?>
		<?php echo $form->textField($model,'sp_phone_no',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sp_fax_no'); ?>
		<?php echo $form->textField($model,'sp_fax_no',array('size'=>45,'maxlength'=>45)); ?>
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