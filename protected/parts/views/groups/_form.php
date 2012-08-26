<div class="">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'groups-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div style="border : solid 2px #ff0000; background : #ffffff; color : #000000; padding : 4px; width : 400px; height : 250px; overflow : auto; ">

	<?php 
	$this->widget('application.components.Relation', array(
		'idValue'=>$model->id,
   		'model' => 'Groups',
   		'relation' => 'roles',
		'field'=>'id',
   		'fields' => 'name',
		'style' => 'Checkbox',
		'relatedPk'=>'id',
		'htmlOptions'=>array('template'=>'{input}{label}','separator'=>'<BR/>'),
		'manyManyTable' =>'group_role',
		'manyManyTableLeft' => 'group_id',
		'manyManyTableRight' =>'role_id',
		'returnLink' => 'none',
		'showAddButton' =>false,
		)
	); 
	?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->