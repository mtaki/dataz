<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'broadcasting-transmitter-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
             'methodChain'=>".result(function(event,item){\$(\"#BroadcastingTransmitter_operator_id\").val(item[1]);})",
             ));
    ?><?php echo $form->error($model,'operator_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'broadcasting_transmitter_type_id'); ?>
		<?php $types=BroadcastingTransmitterType::model()->findAll();
		$typesArray=array();
		$typesArray['']='Select';
		foreach($types as $type){
			$typesArray[$type->id]=$type->code;
		}
		echo CHtml::dropDownList('BroadcastingTransmitter[broadcasting_transmitter_type_id]',$model->broadcasting_transmitter_type_id, $typesArray);
		?>
		
		<?php echo $form->error($model,'broadcasting_transmitter_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num'); ?>
		<?php echo $form->textField($model,'num',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>15,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->