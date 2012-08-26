<div class='form wide'>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'User Information')); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
		
	</div>
	<?php if (Yii::app()->controller->action->id == 'create'){?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>50)); ?>
	</div>
	<?php }?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>50)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php 
		$ms=Department::model()->findAll(array('condition'=>'id <> 0'));
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('User[department_id]',$model->department_id, $mArray); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password1'); ?>
		<?php echo $form->passwordField($model,'password1',array('size'=>20,'maxlength'=>50)); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2',array('size'=>20,'maxlength'=>50)); ?>
	
	</div>
<?php $this->endWidget(); ?> 
	
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Groups')); ?>
  <?php 
	$this->widget('application.components.Relation', array(
		'idValue'=>$model->id,
   		'model' => 'User',
   		'relation' => 'groups',
		'field'=>'id',
   		'fields' => 'name',
		'style' => 'Checkbox',
		'relatedPk'=>'id',
		'htmlOptions'=>array('template'=>'{input}{label}','separator'=>'<BR/>'),
		'manyManyTable' =>'user_group',
		'manyManyTableLeft' =>'user_id',
		'manyManyTableRight' =>'group_id',
		'returnLink' => 'none',
		'showAddButton' =>false,
		)
	); 
	?>
<?php $this->endWidget(); ?> 

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->