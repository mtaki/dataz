<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<table class="detail-view">
	<tr class="odd"><td>Operator</td><td><?php echo CHtml::encode($model->operator->name); ?></td></tr>
	<tr class='even'><td>Number</td><td><?php echo CHtml::encode($model->num); ?></td></tr>
	<tr class='odd'><td>Description</td><td><?php echo $form->textField($model,'description');?></td></tr>
	<tr class='even'><td>Currency</td><td>
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
	<tr class='odd'><td>Amount</td><td><?php echo number_format($model->amount,2).' '.$model->currency->name;?></td></tr>
	<tr class='even'><td>Amount Due</td><td><?php echo number_format($model->amount_due,2).' '.$model->currency->name;?></td></tr>
	<tr class='odd'><td>Amount Paid</td><td><?php echo number_format($model->amount_paid,2).' '.$model->currency->name;?></td></tr>
	</table>


	

	
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
	echo CHtml::Button('Done',array('submit'=>Yii::app()->createUrl('invoice/view',array('id'=>$model->id))));
	?>

<?php $this->endWidget(); ?>
