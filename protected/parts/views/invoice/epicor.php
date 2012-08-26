<h1>Send Invoice to Accounts</h1>

<table class="detail-view">
	<tr class="odd"><td>Operator</td><td>
	<?php 
echo $model->operator->name;
?>
	
	</td></tr>
	
	<tr class='even'><td>Description</td><td><?php echo $model->description;?></td></tr>
	<tr class='odd'><td>Currency</td><td>
	<?php 
	
		echo $model->currency->name;
?>
	</td></tr>
	<tr class='even'><td>Date</td><td>
	<?php echo $model->day;
?>
	
	</td></tr>
</table>

Items
<table class='detail-view'>
<tr style="background-color:#D7DEEE;"><td>Description</td><td>Amount</td></tr>
<?php 
$class='odd';
foreach ($model->invoiceDetails as $d){
	echo "<tr class='$class'><td>$d->description</td><td align='right'>".number_format($d->amount,2)." ".$model->currency->name."</td></tr>";
	if ($class=='odd')
		$class='even';
	else 
		$class='odd';
}
?>
</table>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); 
echo $form->hiddenField($model,'description');
?>
<?php echo CHtml::submitButton('Send'); ?>

<?php $this->endWidget(); ?>