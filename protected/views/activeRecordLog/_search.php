<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>15,'maxlength'=>20)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>15,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'table'); ?>
		<?php echo $form->textField($model,'table',array('size'=>15,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'table_id'); ?>
		<?php echo $form->textField($model,'table_id',array('size'=>15,'maxlength'=>20)); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>45)); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->