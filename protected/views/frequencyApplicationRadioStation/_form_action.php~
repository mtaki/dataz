<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequency-application-radio-station-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'User Information')); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'application_id'); ?>
		<?php echo $form->textField($model,'application_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'index'); ?>
		<?php echo $form->textField($model,'index',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'index'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exact_antenna_site'); ?>
		<?php echo $form->textField($model,'exact_antenna_site',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'exact_antenna_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'make'); ?>
		<?php echo $form->textField($model,'make',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'make'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'call_sign'); ?>
		<?php echo $form->textField($model,'call_sign',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'call_sign'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'antenna_type'); ?>
		<?php echo $form->textField($model,'antenna_type',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'antenna_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Action')); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'licence-application-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model,$log); ?>
	<table>
	<tr><td>Date</td><td colspan='2'>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Log[day]',
        'value'=>$log->day,
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
	</td></tr>
	<tr><td>team</td><td>	  	
	Department
	<?php $groups=Department::model()->findAll();
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		$select_group=CHtml::dropDownList('group','', $groupsArray,
				array(
					'ajax' => array(
						'type'=>'POST', //request type
						'url'=>Yii::app()->createUrl('licenceApplication/officerFilter'), //url to call
						'update'=>'#select1', //selector to update
					)
				)
			);
		echo $select_group;	
	?>
	
	<?php 
	?>
	<script type="text/javascript">
	function mysubmit(){
		var mylist=document.getElementById("select2");
		for (i = 0; i < mylist.options.length; i++) {
			mylist.options[i].selected=true;
		} 	
		document.getElementById("licence-application-form").submit();
	}
	</script>
	</td><td> 
	
	
	</td></tr>
	<tr><td>
	  
   		<select multiple id="select1"></select><BR/> 
   		<!--  a href="#" id="add">add &gt;&gt;</a>-->  
   		<input type='button' id='add' value='add &gt;&gt;'/>
  	
	</td>
	<td>
	<select multiple id="select2"  name='select2[]'></select><BR/>   
   	<input type='button' id='remove' value='&lt;&lt; remove'/>
	</td><td></td></tr>
	<tr><td valign='top'>Comments</td><td colspan=2><?php echo $form->textArea($log,'remarks'); ?><?php echo $form->hiddenField($frequencyApplication,'status'); ?></td></tr>
	
	</table>

<div class="row buttons">
<?php

$s= "
<script type=\"text/javascript\" >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '".Yii::app()->createUrl('site/upload')."',
			name: 'uploadfile',
			data:{entity_id : '$model->id',module : 'licence_application',action_stage : 'Evaluation'},
			onSubmit: function(file, ext){
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				status.text('');
				if(response===\"success\"){
					$('<li></li>').appendTo('#files').html(''+file).addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>
<div id=\"upload\" ><span>Upload Evaluation Report<span></div><span id=\"status\" ></span>
<ul id=\"files\"></ul>";
echo $s;
?>
<input type='button' value='Save' onclick='mysubmit()'/>
</div>

<?php $this->endWidget(); ?>

</div><!-- form --> 
<?php $this->endWidget(); ?>


<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
		<?php echo CHtml::Button('Cancel',array('submit'=>Yii::app()->controller->createUrl('admin')));?>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->


