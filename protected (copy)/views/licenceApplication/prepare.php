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

	

	<?php echo $form->errorSummary($model); ?>
	<table>
	<?php
	if ($model->licenceCategory->id ==4){?>
	<tr><td valign='top'>CP Number</td><td colspan=2><?php echo $form->textField($model,'cp_number'); ?></td></tr>
	<tr><td>CP Issue Date</td><td colspan='2'>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[cp_issue_date]',
        'value'=>$model->cp_issue_date,
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
	<tr><td>CP Expiry Date</td><td colspan='2'>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[cp_expiry_date]',
        'value'=>$model->cp_expiry_date,
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
	<tr><td>CP Effective Date</td><td colspan='2'>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[cp_effective_date]',
        'value'=>$model->cp_effective_date,
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
	<?php }?>
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
	<tr><td valign='top'>Comments</td><td colspan=2><?php echo $form->hiddenField($model,'num'); ?><?php echo $form->textArea($log,'remarks'); ?></td></tr>
	</table>

<?php if ($model->licenceCategory->licenceGroup->id==1 && $model->licenceCategory->id !=4){
$html='Roll Out Plan';
$html.="<table><tr style='background-color:#D7DEEE;'><td>Type of Service/Facility</td><td>Status</td><td>Capacity</td><td>Plan/Time Frame</td><td>Area</td></tr>";
$rs=RollOutPlan::model()->findAll('licence_application_id='.$model->id);
$count=0;
$roll_out_plan=array();
foreach ($rs as $r){
	$roll_out_plan[$count]=array('type'=>$r->service_type,'status'=>$r->status,'capacity'=>$r->capacity,'time'=>$r->time_frame,'area'=>$r->area);
	$count++;
}
$i=0;
for ($i=0;$i<5;$i++){
	$type=$status=$capacity=$time=$area='';
	if(!empty($roll_out_plan[$i]['type']))
		$type=$roll_out_plan[$i]['type'];
	if(!empty($roll_out_plan[$i]['status']))
		$status=$roll_out_plan[$i]['status'];	
	if(!empty($roll_out_plan[$i]['capacity']))
		$capacity=$roll_out_plan[$i]['capacity'];
	if(!empty($roll_out_plan[$i]['time']))
		$time=$roll_out_plan[$i]['time'];
	if(!empty($roll_out_plan[$i]['area']))
		$area=$roll_out_plan[$i]['area'];
	$html.="<tr><td><input size=10 name='type_$i' value='".$type."'/></td><td><input size=10 name='status_$i' value='".$status."'/></td><td><input size=10 name='capacity_$i'  value='".$capacity."'/></td><td><input size=10 name='time_$i' value='".$time."'/></td><td><input size=10 name='area_$i' value='".$area."'/></td></tr>";
}
$html.="</table>";
echo $html;
}
?>
<div class="row buttons">
<input type='submit' name='insert' value='Save'/>
</div>

<?php $this->endWidget(); ?>

</div><!-- form --> 
<?php $this->endWidget(); ?>
<h1>Prepare Licence</h1>

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>

<?php 
Yii::app()->clientScript->registerScript('POS_READY','
	$().ready(function() {  
	    $(\'#add\').click(function() {  
	     return !$(\'#select1 option:selected\').remove().appendTo(\'#select2\');  
	    });  
	     $(\'#remove\').click(function() {  
	     return !$(\'#select2 option:selected\').remove().appendTo(\'#select1\');  
	    });  
}); 


');
?>
<?php 
if(!empty($model->licenceCategory->licence_file)){
$url=Yii::app()->createUrl('site/printDocs',array('id'=>$model->id,'file'=>$model->licenceCategory->licence_file));
$button1="<input type='button' onclick=\"document.location='$url';\" value='Print Licence'/>";
echo  $button1;
}
?>
<?php 
if(!empty($model->licenceCategory->certificate_file)){
$url=Yii::app()->createUrl('site/printDocs',array('id'=>$model->id,'file'=>$model->licenceCategory->certificate_file));
$button1="<input type='button' onclick=\"document.location='$url';\" value='Print Certificate'/>";
echo  $button1;
}
?>
