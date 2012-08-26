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
		<?php echo $form->label($model,'complainant_id'); ?>
		<?php
		echo $form->hiddenField($model,'complainant_id');
		$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'complainant_name', 
                         //replace controller/action with real ids
             'url'=>array('complaintParty/autoCompleteLookup'), 
             'max'=>10, //specifies the max number of items to display
 
                         //specifies the number of chars that must be entered 
                         //before autocomplete initiates a lookup
             'minChars'=>2, 
             'delay'=>500, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
 
                         //any additional html attributes that go inside of 
                         //the input field can be defined here
             'htmlOptions'=>array('size'=>'15'), 
             'methodChain'=>".result(function(event,item){\$(\"#Complaint_complainant_id\").val(item[1]);})",
             ));
    ?>
		
	</div>


	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relief'); ?>
		<?php echo $form->textField($model,'relief',array('size'=>20,'maxlength'=>100)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'region_id'); ?>
		<?php 

	$ms=Region::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('Complaint[region_id]',$model->region_id, $mArray);
?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sector_id'); ?>
		<?php 

	$ms=ComplaintSector::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('Complaint[sector_id]',$model->sector_id, $mArray);
?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->