<h1>Numbering Application Evaluation</h1>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Detail')); ?>
<?php 
$html="<table width='600' class='detail-view'>";
$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">General Information</th></tr>";
$html.="<tr align='left' class='even'><th>Operator</th><td>".$model->operator->name."</td><th>Service Licence Number</th><td>$model->service_licence_number</td></tr>";
$html.="<tr align='left' class='odd'><th>Type</th><td>".$model->numberingResourceType->name."</td><th>Application Date</th><td>$model->application_date</td></tr>";

$html.="<tr align='left' class='even'><th>Date by which assignment to be effected</th><td>$model->effective_date</td><th></th><td></td></tr>";
$html.="<tr align='left' class='odd'><th>Planned operational date</th><td>$model->operation_start_date</td><th></th><td></td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>Purpose of the applied Number range</th><td colspan='2'>$model->purpose</td></tr>";
$html.="<tr align='left' class='odd'><th colspan='2'>Geographical Area(s) where the service will be offered using the applied number range(s)..</th><td colspan='2'>$model->areas</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>Status of the existing Assignment/Reservations in the same geographical area(s): </th><td colspan='2'>$model->status_existing_numbers</td></tr>";
$html.="<tr align='left' class='odd'><th colspan='2'>Which networks/operators your network is directly interconnected with, and at what level of interconnection</th><td colspan='2'>$model->interconnection</td></tr>";
$html.="<tr align='left' class='even'><th colspan='2'>Numbers allocated to end-users and are in service</th><td colspan='2'>$model->numbers_in_use</td></tr>";
$html.="<tr align='left'><th colspan='4' style=\"background-color:#D7DEEE;\">Declaration</th></tr>";
$html.="<tr align='left' class='odd'><th>Name</th><td>".$model->signatory_name."</td><th>Position</th><td>$model->signatory_title</td></tr>";
$html.="<tr align='left' class='even'><th>Date</th><td>".$model->sign_date."</td><th></th><td></td></tr>";

$preffered_numbers='';
	
	$c=1;
	$numbers=NumberingResource::model()->findAll("REQUEST_TYPE='Application' AND APPLICATION_ID=".$model->id);
	foreach ($numbers as $nr){
		$num=$nr->num;
		$preffered_numbers.="<tr class='odd'><td>Number $c:</td><td>$num</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		$c++;
		
	}
	if(!empty($preffered_numbers))
		$preffered_numbers="<tr align='left'><td colspan='4' style=\"background-color:#D7DEEE;\">Preffered Numbers</td></tr>".$preffered_numbers;
	
	$assigned_numbers='';
	$numbers=NumberingResource::model()->findAll("status='In Use' AND APPLICATION_ID=".$model->id);
	foreach ($numbers as $nr){
		$num=$nr->num;
		$assigned_numbers.="<tr class='odd'><td>Number $c:</td><td>$num</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		$c++;
		
	}
	if(!empty($assigned_numbers))
		$assigned_numbers="<tr align='left'><td colspan='4' style=\"background-color:#D7DEEE;\">Assigned Numbers</td></tr>".$assigned_numbers;

$html.=$preffered_numbers.$assigned_numbers."</table>";
echo $html;
?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Payments')); ?>
	<?php $this->renderPartial('//site/payment', array('entityType'=>'numbering_application','entityId'=>$model->id,'invoiceType'=>''))?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'History')); ?>
	<?php $this->renderPartial('//site/history', array('entityType'=>'numbering_application','entityId'=>$model->id))?>
<?php $this->endWidget(); ?>



<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Action')); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-application-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model,$log); ?>
	<?php 
	
	?>
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
	
	
	<tr><td valign='top'>Comments</td><td colspan=2><?php echo $form->hiddenField($model,'status'); ?><?php echo $form->textArea($log,'remarks'); ?></td></tr>
	
	<tr><td>Receiver Name</td><td><?php echo $form->textField($model,'dispatch_name'); ?></td></tr>
	<tr><td>Receiver Title</td><td><?php echo $form->textField($model,'dispatch_title'); ?></td></tr>
	</table>

<div class="row buttons">
<?php echo CHtml::submitButton('Save',array('name'=>'save')); ?>
</div>
</div><!-- form -->
<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>





<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>