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
		<?php echo $form->label($model,'operator_id'); ?>
		<?php 
echo CHtml::hiddenField('FrequencyApplication[operator_id]');
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
 
             'methodChain'=>".result(function(event,item){\$(\"#FrequencyApplication_operator_id\").val(item[1]);})",
             ));
    ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'FrequencyApplication[application_date]',
        'value'=>$model->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
        ),
        'htmlOptions'=>array('size'=>15),
       )
     );
?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'frequency_application_type_id'); ?>
		<?php echo $form->dropdownList($model,'frequency_application_type_id',Chtml::listData(FrequencyApplicationType::model()->findAll(),'id','name'),array('empty'=>'Select')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->