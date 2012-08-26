<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<table class="detail-view">
	<tr class="odd"><td>Operator</td><td>
	<?php 
echo $form->hiddenField($model,'operator_id');
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
 			 'value'=>(empty($model->operator_id))?'':$model->operator->name,
             'methodChain'=>".result(function(event,item){\$(\"#Invoice_operator_id\").val(item[1]);})",
             ));
    ?>
	
	</td></tr>
	
	<tr class='even'><td>Description</td><td><?php echo $form->textArea($model,'description');?></td></tr>
	<tr class='odd'><td>Currency</td><td>
	<?php 
	$currencies=Currency::model()->findAll();
		$currencyArray=array();
		$currencyArray['']='Select';
		foreach($currencies as $currency){
			$currencyArray[$currency->id]=$currency->name;
		}
		echo CHtml::dropDownList('Invoice[currency_id]',$model->currency_id, $currencyArray);
?>
	</td></tr>
	<tr class='even'><td>Date</td><td>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name'=>'Invoice[day]',
        'value'=>$model->day,
        'options'=>array(
                'dateFormat'=>Yii::app()->params->datePickerFormat,
                'showAnim'=>'slideDown',
                'showButtonPanel'=>'true',
                'constrainInput'=>'false',
                ))
        );
?>
	
	</td></tr>
	</table>



<h1>Items:</h1>
<table  class="detail-view">
<tr class="odd">
    <td><?php echo InvoiceDetail::model()->getAttributeLabel('description')?></td>
    <td><?php echo InvoiceDetail::model()->getAttributeLabel('amount')?></td>
    <td><?php echo CHtml::link('add', '#', array('submit'=>'', 'params'=>array('InvoiceDetail[command]'=>'add', 'noValidate'=>true)));?></td>
</tr>
<?php 
$class='odd';
foreach($invoiceDetailManager->items as $id=>$invoiceDetail):?>
 
<?php 
if ($class=='odd')
	$class='even';
else 
	$class='odd';

$this->renderPartial('_formInvoiceDetail', array('id'=>$id, 'model'=>$invoiceDetail, 'form'=>$form,'class'=>$class));?>
 
<?php endforeach; ?>
</table>	

	
	
		<?php echo CHtml::submitButton('Save',array('name'=>'update')); ?>

<?php $this->endWidget(); ?>
