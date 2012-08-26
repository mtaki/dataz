

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'complaint-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->errorSummary($model); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'General Information')); ?>
	<table>
<tr><td colspan='2'><fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Complaint Parties</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Complainant</td>
    <td>
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
 			 'value'=>(empty($model->complainant_id))?'':$model->complainant->name,
             'methodChain'=>".result(function(event,item){\$(\"#Complaint_complainant_id\").val(item[1]);})",
             ));
    ?>
    <script type="text/javascript">

function openComplainant() {
var url='';
url='<?php echo Yii::app()->createUrl('complaintParty/update'); ?>';
if(document.getElementById("Complaint_complainant_id").value != ''){
	url=url+'/id/'+document.getElementById('Complaint_complainant_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
<script type="text/javascript">

function openNew() {
var url='';
url='<?php echo Yii::app()->createUrl('complaintParty/create'); ?>';
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}

</script>
    <input type="button" onclick="openComplainant();" value='Edit'> <input type="button" onclick="openNew();" value='New'>
    
    </td>

    <td>Respondent</td>
    
    <td>
    <?php 
echo $form->hiddenField($model,'respondent_id'); 
$this->widget('CAutoComplete',
          array(
                         //name of the html field that will be generated
             'name'=>'respondent_name', 
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
 			 'value'=>(empty($model->respondent_id))?'':$model->respondent->name,
             'methodChain'=>".result(function(event,item){\$(\"#Complaint_respondent_id\").val(item[1]);})",
             ));
    ?>
    <script type="text/javascript">

function openRepondent() {
var url='';
url='<?php echo Yii::app()->createUrl('complaintParty/update'); ?>';
if(document.getElementById("Complaint_respondent_id").value != ''){
	url=url+'/id/'+document.getElementById('Complaint_respondent_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
    <input type="button" onclick="openRepondent();" value='Edit'> <input type="button" onclick="openNew();" value='New'>
    </td>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Complaint Details</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
	<tr>

    <td valign='top'>Sector</td>
    <td>
    <?php 

	$ms=ComplaintSector::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('Complaint[sector_id]',$model->sector_id, $mArray);
?>
    </td>
    <td valign='top'>Region</td>
    <td>
    <?php 

	$ms=Region::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('Complaint[region_id]',$model->region_id, $mArray);
?>
    </td>

  </tr>
	<tr>
    <td valign='top'>Description of complaint</td>
    <td>
    <?php echo $form->textArea($model,'description',array('size'=>20)); ?>
    </td>
    <td valign='top'>Responce of Respondent</td>
    <td><?php echo $form->textArea($model,'responce',array('size'=>20)); ?></td>
  </tr>

	<tr>
		<td valign='top'>Relief</td>
    <td valign='top'><?php echo $form->textArea($model,'relief',array('size'=>20)); ?></td>
    <td valign='top'>Relief Type</td>
    <td valign='top'>
    <?php 

	$ms=ReliefType::model()->findAll();
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('Complaint[relief_type_id]',$model->relief_type_id, $mArray);
?>
    </td>

    
  </tr>
  <tr>
		<td valign='top'>Verification and Investigation</td>
    <td valign='top'><?php echo $form->textArea($model,'verification',array('size'=>20,'maxlength'=>200)); ?></td>
    <td valign='top'>&nbsp;</td>
    <td valign='top'>&nbsp;</td>
    
  </tr>
  
  </table>

  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Complainant</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Signed by</td>
    <td><?php echo $form->textField($model,'verification_comp_signatory',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>Date</td>
    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Complaint[verification_comp_date]',
        'value'=>$model->verification_comp_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>

  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>TCRA Officer</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Signed by</td>
    <td><?php echo $form->textField($model,'verification_tcra_signatory',array('size'=>20,'maxlength'=>50)); ?></td>

    <td>Date</td>
    <td>
   <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Complaint[verification_tcra_date]',
        'value'=>$model->verification_tcra_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
</td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Respondent</strong></legend>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td>Signed by</td>
    <td><?php echo $form->textField($model,'verification_resp_signatory',array('size'=>20,'maxlength'=>50)); ?></td>
    <td>Date</td>
    <td>
     <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Complaint[verification_resp_date]',
        'value'=>$model->verification_resp_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?></td>
  </tr>
</table>
</fieldset>
</td></tr>
<tr><td></td><td>&nbsp;</td></tr>
</table>
	
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Nature of Complaint')); ?>

  <?php 
	$this->widget('application.components.Relation', array(
		'idValue'=>$model->id,
   		'model' => 'Complaint',
   		'relation' => 'complaintTypes',
		'field'=>'id',
   		'fields' => 'name',
		'style' => 'Checkbox',
		'relatedPk'=>'id',
		'htmlOptions'=>array('template'=>'{input}{label}','separator'=>'<BR/>'),
		'manyManyTable' =>'complaint2type',
		'manyManyTableLeft' =>'complaint_id',
		'manyManyTableRight' =>'type_id',
		'returnLink' => 'none',
		'showAddButton' =>false,
		)
	); 
	?>

<?php $this->endWidget(); ?>


<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
 
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>