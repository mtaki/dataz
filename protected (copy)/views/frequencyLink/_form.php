<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-link-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<?php echo $form->labelEx($model,'operator_id'); ?>
	<?php echo $form->hiddenField($model,'operator_id'); 
$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'operator_name', 
                         //replace controller/action with real ids
             'url'=>array('operator/autoCompleteLookup'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'15'), 
          	  'value'=>(!empty($model->operator_id))?$model->operator->name:'',
             'methodChain'=>".result(function(event,item){\$(\"#FrequencyLink_operator_id\").val(item[1]);})",
             ));
    ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_link_type_id'); ?>
		<?php $groups=FrequencyLinkType::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		echo CHtml::dropDownList('FrequencyLink[frequency_link_type_id]',$model->frequency_link_type_id, $groupsArray);
		?>
		<?php echo $form->error($model,'frequency_link_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('cols'=>20,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->