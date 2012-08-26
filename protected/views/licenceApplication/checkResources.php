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
	<tr><td>Resource Avalability </td><td><?php
	$app_status=array(""=>"","Available"=>"Available","Not available"=>"Not available"); 
	echo $form->dropdownList($model,'app_status',$app_status)?></td></tr>
	<tr><td valign='top'>Comments</td><td colspan=2><?php echo $form->textArea($log,'remarks'); ?><?php echo $form->hiddenField($model,'status'); ?></td></tr>
	
	</table>

<div class="row buttons">

<input type='button' value='Save' onclick='mysubmit()'/>
</div>

<?php $this->endWidget(); ?>

</div><!-- form --> 
<?php $this->endWidget(); ?>
<h1>Licence Application - Check Resource Availability</h1>

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

