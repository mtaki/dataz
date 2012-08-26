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
	<?php $this->renderPartial('//site/payment', array('entityType'=>'frequency_application','entityId'=>$model->id,'invoiceType'=>''))?>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'History')); ?>
	<?php $this->renderPartial('//site/history', array('entityType'=>'frequency_application','entityId'=>$model->id))?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Action')); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'numbering-application-form',
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
	
	
	<tr><td valign='top'>Comments</td><td colspan=2><?php echo $form->hiddenField($model,'status'); ?>
	<?php echo $form->textArea($log,'remarks'); ?></td></tr>
	
	
	</table>

<div class="row buttons">
<?php echo CHtml::submitButton('Save',array('name'=>'save')); ?>
</div>
</div><!-- form -->
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
<!--  h1>View LicenceApplication #<?php echo $model->id; ?></h1>-->

<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
