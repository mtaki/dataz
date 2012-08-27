<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'file_number'); ?>
		<?php echo $form->textField($model,'file_number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_1'); ?>
		<?php echo $form->textField($model,'status_1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_2'); ?>
		<?php echo $form->textField($model,'status_2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_3'); ?>
		<?php echo $form->textField($model,'status_3',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_4'); ?>
		<?php echo $form->textField($model,'status_4',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_date_1'); ?>
		<?php echo $form->textField($model,'status_date_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_date_2'); ?>
		<?php echo $form->textField($model,'status_date_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_date_3'); ?>
		<?php echo $form->textField($model,'status_date_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_date_4'); ?>
		<?php echo $form->textField($model,'status_date_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_type_id'); ?>
		<?php echo $form->textField($model,'application_type_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->