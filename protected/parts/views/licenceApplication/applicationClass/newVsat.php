<?php
/*$this->breadcrumbs=array(
	'Licence Applications'=>array('admin'),
	'New Licence Application',
);*/

$this->menu=array(
	array('label'=>'List LicenceApplication', 'url'=>array('index')),
	array('label'=>'Manage LicenceApplication', 'url'=>array('admin')),
);
?>

<h1>Licence Application</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php echo CHtml::errorSummary(array($a,$b,$c)); ?>
<?php
	echo $form->hiddenField($a,'licence_category_id',array('size'=>15,'maxlength'=>50,'value'=>$a->licence_category_id));
		
?>
<table>
<tr><td colspan='2'><fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>General Information</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="600">Applicant</td>
    <td width="600">
    <?php 
echo CHtml::hiddenField('LicenceApplication[operator_id]');
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
             'value'=>(empty($a->operator_id))?'':$a->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#LicenceApplication_operator_id\").val(item[1]);})",
             ));
    ?>
    <script type="text/javascript">

function openOperator() {
var url='';
url='<?php echo Yii::app()->createUrl('operator/edit'); ?>';
if(document.getElementById("LicenceApplication_operator_id").value != ''){
	url=url+'/id/'+document.getElementById('LicenceApplication_operator_id').value;
	aWindow = window.open(url,
	       'thewindow','width=800,height=500,location=no,resizable=yes,scrollbars=yes,screenX=20,screenY=20,top=20,left=20');
	}
}
</script>
    <input type="button" onclick="openOperator();" value='Update Applicant Details'>
    </td>
    <td width="600">File Number</td>

    <td width="600"><?php echo $form->textField($b,'file_number',array('size'=>15,'maxlength'=>50)); ?></td>
  </tr>
    
  <tr>

  	<td >Application&nbsp;Date</td>
    <td >
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[application_date]',
        'value'=>$a->application_date,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
    </td>
    <td>Category</td>
    <td><?php
  	
  	 $ms=MarketSegment::model()->findAll(array('condition'=>'licence_category_id='.$a->licence_category_id,'order'=>'order_code'));
		
		$mArray=array();
		$mArray['']='Select';
		foreach($ms as $m){
			$mArray[$m->id]=$m->name;
		}
		echo CHtml::dropDownList('LicenceApplication[market_segment_id]',$a->market_segment_id, $mArray);?>
</td>
    
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Application Details</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Classfication</td>
<td colspan='4'><?php echo $form->textField($b,'classification',array('size'=>50,'maxlength'=>50)); ?>
</td>
</tr>
  <tr>
    <td>Status</td>
    <td><?php echo $form->textField($b,'status_1',array('size'=>15,'maxlength'=>50)); ?></td>
	<td><?php echo $form->textField($b,'status_2',array('size'=>15,'maxlength'=>50)); ?></td>
	<td><?php echo $form->textField($b,'status_3',array('size'=>15,'maxlength'=>50)); ?></td>
	<td><?php echo $form->textField($b,'status_4',array('size'=>15,'maxlength'=>50)); ?></td>
	
  </tr>
  <tr>
    <td>Status Date</td>
    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'ApplicationVsat[status_date_1]',
        'value'=>$b->status_date_1,
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
    </td>
	<td>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'ApplicationVsat[status_date_2]',
        'value'=>$b->status_date_2,
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
	</td>
	<td>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'ApplicationVsat[status_date_3]',
        'value'=>$b->status_date_3,
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
	</td>
	<td>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'ApplicationVsat[status_date_4]',
        'value'=>$b->status_date_4,
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
	</td>
	
  </tr>

 
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Operations Address</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr> 
   <td colspan='2'>Operator Name: 
   </td>
	<td>Phone Number:
	</td>
	</tr>
	<tr> 
   <td colspan='2'>Operator Company/Agency Name: 
   </td>
	<td>Fax Number:
	</td>
	
	</tr>
	<tr> 
   <td colspan='3'>Country of registry of this MES (Mobile Earth station):
   
   </td>
	
	</tr>
	
	<tr> 
   <td>City address:</td>
	<td>District/Region:</td>
	<td>Country:</td>
	</tr>
  </table>
</fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Application Fee Receipt</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td width='25%'>Number</td>

    <td width='25%'><?php echo $form->textField($c,'num',array('size'=>15,'maxlength'=>50)); ?></td>
	 <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
  </tr>
  </table>
  </fieldset>
<fieldset style="-moz-border-radius: 0.4em;">
<legend><strong>Client Declaration</strong></legend>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Signatory&nbsp;Name</td>

    <td><?php echo $form->textField($a,'signatory_name',array('size'=>15,'maxlength'=>50)); ?></td>
    
    <td>Date</td>
    <td>
    <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'LicenceApplication[sign_date]',
        'value'=>$a->sign_date,
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

  </fieldset>
</td></tr>
<tr><td><input type='submit' name='save' value='Save Draft'>&nbsp;<input type='submit' name='retrieve' value='Retrieve Draft'>&nbsp;<input type='submit' name='insert' value='Submit'></td><td>&nbsp;</td></tr>
</table>


<?php $this->endWidget(); ?>
