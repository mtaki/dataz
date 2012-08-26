<h1>Change password user <?php echo $model->username; ?></h1>

<div class='form wide'>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'password3'); ?>
		<?php echo $form->passwordField($model,'password3',array('size'=>20,'maxlength'=>50)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password1'); ?>
		<?php echo $form->passwordField($model,'password1',array('size'=>20,'maxlength'=>50)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2',array('size'=>20,'maxlength'=>50)); ?>
	
	</div>



<div class="row buttons">
		<?php echo CHtml::submitButton('Change Password'); ?>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->