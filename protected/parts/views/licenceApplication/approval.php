<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.op-form').toggle();
	return false;
});
");
?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Detail')); ?>
<?php $this->renderPartial('detail', array('model'=>$model))?>
<p>
<?php echo CHtml::link('Applicant Details','#',array('class'=>'search-button')); ?>
<div class="op-form" style="display:none">
<?php $this->renderPartial('//operator/view', array('model'=>$model->applicant))?>
</div>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Payments')); ?>
	<?php $this->renderPartial('//site/payment', array('entityType'=>'licence_application','entityId'=>$model->id,'invoiceType'=>''))?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'History')); ?>
	<?php $this->renderPartial('//site/history', array('entityType'=>'licence_application','entityId'=>$model->id))?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Documents')); ?>
	<?php $this->renderPartial('//site/document', array('entityType'=>'licence_application','entityId'=>$model->id))?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Action')); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'licence-application-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model,$log); ?>
	<?php 
	
	?>
	<table>
	<tr><td>Authorisation</td><td>	  	
	
	<?php 
		$authorityArray=array();
		$authorityArray['']='Select';
		$authorityArray['DG']='DG';
		$authorityArray['Management']='Management';
		$authorityArray['Board']='Board';
		$authorityArray['Minister']='Minister';
		echo CHtml::dropDownList('Log[team]','', $authorityArray,
				array(
					'ajax' => array(
						'type'=>'POST', //request type
						'url'=>Yii::app()->createUrl('licenceApplication/decisionFilter'), //url to call
						'update'=>'#status', //selector to update
					)
				)
			);
		
		
	?>
	
	</td><td></td></tr>
	<tr><td>Decision</td><td>	  	
	
	<?php 
		$decisionArray=array();
		
		echo CHtml::dropDownList('status','', $decisionArray);
		/*
		 * decisions updated by ajax
		RecommendedBoard -> Recommended For Board Approval
		RecommendedMinister -> Recommended For Minister Consultation
		MinisterConsultation -> Minister Consultation
		Approved -> Approved
		Rejected -> Rejected
		Returned -> Returned
		*/
	?>
	
	</td><td></td></tr>
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
	
	
	<tr><td valign='top'>Comments</td><td colspan=2><?php echo $form->hiddenField($model,'status'); ?><?php echo $form->textArea($log,'remarks'); ?></td></tr>
	
	<?php if ($model->licenceCategory->licenceGroup->id==2) {?>
	<tr><td></td><td colspan='2'>
	<?php 
		$groups=LicenceCategory::model()->findAll(array('condition'=>'licence_group_id=2','order'=>'order_code'));
		$groupsArray=array();
		$groupsArray['']='Select';
		foreach($groups as $group){
			$groupsArray[$group->id]=$group->name;
		}
		$select_group=CHtml::dropDownList('categoryid','', $groupsArray);
		//echo $select_group;	
	?>
	</td></tr>
	<?php }?>
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
			data:{entity_id : '$model->id',module : 'licence_application',action_stage : 'Approval'},
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
<div id=\"upload\" ><span>Upload Documents<span></div><span id=\"status\" ></span>
<ul id=\"files\"></ul>";
echo $s;
?>
<?php echo CHtml::submitButton('Save',array('name'=>'save')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form --> 
<?php $this->endWidget(); ?>
<h1>Licence Application Approval</h1>

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

